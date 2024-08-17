<?php

namespace App\Livewire;

use App\Models\Book;
use App\Traits\ConvertsEmptyStringsToNull;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateBookBtn extends Component
{
    use WithFileUploads;

    #[Validate()]
    public $id;
    public $title;
    public $author;
    public $description;
    public $pages;
    public $price;
    public $image;
    public $uploadedImage;


    protected $rules = [
        'title' => 'required|string',
        'author' => 'required|string',
        'description' => 'nullable|string',
        'pages' => 'nullable|numeric',
        'price' => 'nullable|numeric',
        'image' => 'nullable|sometimes|image|max:1024',
    ];
    protected $listeners = ['showEditModal' => 'editBook'];

    public function save()
    {
        //dd(request()->all());
        $validatedData = $this->validate();

        try {
            if ($this->id) {

                $book = Book::find($this->id);


                if ($this->image) {
                    if (is_object($this->image)) { // Check if it's a new upload
                        $this->deleteOldImageIfExists($book->image);
                        $validatedData['image'] = $this->storeImage();
                    } else {
                        $validatedData['image'] = $this->uploadedImage;
                    }
                } else {
                    $validatedData['image'] = $this->uploadedImage;
                }

                $book->update($validatedData);


                session()->flash('success', 'Book updated successfully.');
            } else {

                if (!empty($this->image)) {
                    $validatedData['image'] = $this->image->store('images', 'public');
                }

                Book::create($validatedData);
                session()->flash('success', 'Book created successfully.');
            }
            $this->dispatch('close-modal');
            $this->dispatch('bookAdded');

            $this->resetInputFields();
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function refresh()
    {
        $this->dispatch('bookAdded');
    }
    private function storeImage()
    {
        if ($this->image) {

            $imageName = 'avatar_' . time() . '.' . $this->image->getClientOriginalExtension();
            return $this->image->storeAs('images', $imageName, 'public');
        }

        return null;
    }
    private function deleteOldImageIfExists($imagePath)
    {
        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->author = '';
        $this->description = '';
        $this->pages = null;
        $this->price = null;
        $this->image = null;
        $this->uploadedImage = null;
    }
    public function editBook($id)
    {
        $book = Book::findOrFail($id);

        $this->id = $book->id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->description = $book->description;
        $this->pages = $book->pages;
        $this->price = $book->price;
        $this->uploadedImage = $book->image;
        $this->dispatch('show-modal');
    }

    public function render()
    {
        return view('livewire.create-book-btn');
    }
}
