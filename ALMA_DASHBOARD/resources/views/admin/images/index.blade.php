@extends('layouts.master')

@section('title', 'Images List')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Images List</h4>

                <!-- Add New Image Button -->
                <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addImageModal">Add Image</button>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product ID</th>
                                <th>URL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="imagesTableBody">
                            @foreach($images as $image)
                                <tr id="image-row-{{ $image->id }}">
                                    <td>{{ $image->id }}</td>
                                    <td>{{ $image->product_id }}</td>
                                    <td>{{ $image->url }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm view-details-btn" data-id="{{ $image->id }}">View</button>
                                        <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $image->id }}" data-url="{{ $image->url }}" data-product_id="{{ $image->product_id }}">Edit</button>
                                        @if($image->deleted_at)
                                            <button class="btn btn-danger btn-sm" disabled>Deleted</button>
                                        @else
                                            <button class="btn btn-danger btn-sm soft-delete-btn" data-id="{{ $image->id }}">Delete</button>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Hidden row for image details -->
                                <tr id="details-row-{{ $image->id }}" class="details-row" style="display: none;">
                                    <td colspan="4">
                                        <ul>
                                            <li><strong>Alt Text:</strong> {{ $image->alt_text }}</li>
                                            <li><strong>Created At:</strong> {{ $image->created_at }}</li>
                                            <li><strong>Deleted At:</strong> {{ $image->deleted_at ?? 'N/A' }}</li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Add Image -->
<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addImageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addImageModalLabel">Add Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="imageForm" method="POST" action="">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="product_id">Product ID</label>
                        <input type="text" class="form-control" id="product_id" name="product_id" required>
                    </div>
                    <div class="form-group">
                        <label for="url">Image URL</label>
                        <input type="url" class="form-control" id="url" name="url" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Edit Image -->
<div class="modal fade" id="editImageModal" tabindex="-1" role="dialog" aria-labelledby="editImageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editImageModalLabel">Edit Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editImageForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_product_id">Product ID</label>
                        <input type="text" class="form-control" id="edit_product_id" name="product_id" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_url">Image URL</label>
                        <input type="url" class="form-control" id="edit_url" name="url" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Toggle view details for images
        document.querySelectorAll('.view-details-btn').forEach(button => {
            button.addEventListener('click', () => {
                const imageId = button.getAttribute('data-id');
                const detailsRow = document.querySelector(`#details-row-${imageId}`);
                if (detailsRow.style.display === 'none') {
                    detailsRow.style.display = '';
                } else {
                    detailsRow.style.display = 'none';
                }
            });
        });

        // Handle soft delete for images
        document.querySelectorAll('.soft-delete-btn').forEach(button => {
            button.addEventListener('click', async () => {
                const imageId = button.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action will soft delete the image!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, soft delete it!',
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const response = await fetch(`/admin/images/${imageId}/soft-delete`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Content-Type': 'application/json',
                                }
                            });

                            if (response.ok) {
                                const data = await response.json();
                                if (data.success) {
                                    Swal.fire('Deleted!', 'Image has been soft deleted.', 'success');
                                    const row = document.querySelector(`#image-row-${imageId}`);
                                    row.classList.add('text-muted');
                                    button.disabled = true;
                                    button.innerText = 'Deleted';
                                } else {
                                    Swal.fire('Error', 'Failed to delete image.', 'error');
                                }
                            } else {
                                Swal.fire('Error', 'Failed to communicate with the server.', 'error');
                            }
                        } catch (error) {
                            Swal.fire('Error', 'Network error. Failed to communicate with the server.', 'error');
                        }
                    }
                });
            });
        });

        // Open the modal to add a new image
        document.querySelector('.btn-success').addEventListener('click', () => {
            document.querySelector('#imageForm').reset();
            document.querySelector('#addImageModalLabel').innerText = 'Add Image';
            document.querySelector('#imageForm').setAttribute('action', '/admin/images'); // Change to your add image route
        });

        // Edit button click
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', () => {
                const imageId = button.getAttribute('data-id');
                const productId = button.getAttribute('data-product_id');
                const url = button.getAttribute('data-url');
                document.querySelector('#edit_product_id').value = productId;
                document.querySelector('#edit_url').value = url;
                document.querySelector('#editImageModalLabel').innerText = 'Edit Image';
                document.querySelector('#editImageForm').setAttribute('action', `/admin/images/${imageId}`); // Change to your update image route
                $('#editImageModal').modal('show');
            });
        });
    });
</script>
@endpush
