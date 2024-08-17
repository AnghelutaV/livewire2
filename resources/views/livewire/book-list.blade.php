<div wire:ignore.self class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Author</th>
                <th>Price</th>
                <th>Pages</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($books as $book)
                <tr wire::key="{{ $book->id }}">
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->pages }}</td>
                    <td class="d-flex justify-content-center">
                        <div class="ml-3">
                            <button wire:click="editBook( {{ $book->id }})"
                                class="btn btn-primary btn-sm me-2">Edit</button>
                        </div>
                        <button class="btn btn-danger btn-sm"
                            wire:click="showDeleteModal({{ $book->id }})">Delete</button>
                        <!-- Add edit button and route to edit page if needed -->
                    </td>
                </tr>
            @endforeach
            {{ $books->links() }}
        </tbody>
    </table>
    @include('components.delete_modal')
</div>
@script
    <script>
        $wire.on('show-delete-modal', () => {
            $('#deleteModal').modal('show');
        });

        $wire.on('close-delete-modal', () => {
            $('#deleteModal').modal('hide');
        });
    </script>
@endscript
