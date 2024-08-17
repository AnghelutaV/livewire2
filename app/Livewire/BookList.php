<?php


namespace App\Livewire;

use App\Events\TestEvent;
use App\Models\Book;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class BookList extends Component
{
    use WithPagination;

    public $bookToDelete;

    protected $listeners = ['bookAdded' => 'refreshBooks'];

    public function mount()
    {
        $this->refreshBooks();
    }
    public function render()
    {
        $books = Book::paginate(6);

        return view('livewire.book-list', ['books' => $books]);
    }
    #[On('echo:wBSOCKET,TestEvent')]
    public function refreshBooks()
    {
        Log::info('in component with echo');
        // Reset pagination to the first page
        //broadcast(new TestEvent('testMessage'))->toOthers();

        $this->dispatch('bookAdded');

        $this->resetPage();
    }

    public function deleteBook($deleteId)
    {
        $book = Book::find($deleteId)->first();
        if ($book) {
            if ($book->image && Storage::disk('public')->exists($book->image)) {
                Storage::disk('public')->delete($book->image);
            }

            $book->delete();

            session()->flash('success', 'Book deleted successfully.');

            $this->dispatch('close-delete-modal');

            $this->refreshBooks();
        }
    }
    public function editBook($id)
    {
        $this->dispatch('showEditModal', $id);
    }
    public function showDeleteModal($id)
    {

        $this->bookToDelete = Book::where('id', $id)->first();

        $this->dispatch('show-delete-modal');
    }
}
