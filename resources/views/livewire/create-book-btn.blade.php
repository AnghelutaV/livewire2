<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Manage Books</h1>

    <button type="button" class="btn btn-success" wire:click="refresh" wire:loading.attr="disabled">
        <i class="bi bi-arrow-clockwise " wire:loading.remove wire:target="refresh"></i>

        <span wire:loading wire:target="refresh">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        </span>
        Refresh
    </button>

    <button type="button" class="btn btn-primary"  data-toggle="modal"
        data-target="#exampleModal">
        New book
    </button>

    <div wire:ignore.self id="exampleModal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ !empty($title) ? 'Update' : 'Create' }}
                         book
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save" enctype=”multipart/form-data”>
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control rounded-pill border-info" id="title"
                                        wire:model.defer="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="author" class="form-label">Author</label>
                                    <input type="text" class="form-control rounded-pill border-info" id="author"
                                        wire:model.defer="author">
                                    @error('author')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control  border-info" id="description" rows="3" wire:model.defer="description"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pages" class="form-label">Pages</label>
                                    <input type="number" class="form-control rounded-pill border-info" id="pages"
                                        wire:model.defer="pages">
                                    @error('pages')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control rounded-pill border-info" id="price"
                                        wire:model.defer="price">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" accept="image/jpg, image/png, image/webp"
                                        class="form-control rounded-pill border-info" id="image"
                                        wire:model.defer="image">

                                    <div class="mt-2">

                                        @if ($image && Illuminate\Support\Str::endsWith($image, '.tmp'))
                                            @if (str_starts_with($image->getMimeType(), 'image/'))
                                                <p>New Image:</p>
                                                <img src="{{ $image->temporaryUrl() }}" alt="Temporary Image"
                                                    style="max-width: 200px;">
                                            @else
                                                <p class="text-danger">The uploaded file is not an image.</p>
                                            @endif
                                        @else
                                            <p>Uploaded Image:</p>
                                            <img src="{{ asset('storage/' . $uploadedImage) }}" alt="Uploaded Image"
                                                style="max-width: 200px;">
                                        @endif
                                    </div>
                                    <div wire:loading wire:target='image'>
                                        <span>Uploading...</span>
                                    </div>

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end align-items-start">
                            <div class="mb-3">
                                <button type="button" class="btn btn-secondary me-2"
                                    data-dismiss="modal" wire:click="resetInputFields">{{__('string.cancel')}}</button>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ !empty($title) ? 'Update' : 'Create' }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
    <style>
        .animate-spin {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
@endpush
@script
    <script>
        $wire.on('close-modal', () => {
            $('#exampleModal').modal('hide');
        });
        $wire.on('show-modal', () => {
            $('#exampleModal').modal('show');
        });
    </script>
@endscript
