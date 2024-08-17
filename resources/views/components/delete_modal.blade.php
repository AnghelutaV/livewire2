<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Are you sure to Delete this book?</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><b>Nr:</b> {{ $bookToDelete->id ?? '' }}</p>
                <b>Title:</b> {{ $bookToDelete->title ?? '' }}
                <p><b>Author:</b> {{ $bookToDelete->author ?? '' }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"
                    wire:click="deleteBook({{ $bookToDelete->id ?? '' }})">Delete</button>
            </div>
        </div>
    </div>
</div>
