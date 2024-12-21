@extends('layouts.master')

@section('title', 'Reviews List')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Reviews List</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="reviewsTableBody">
                            @foreach($reviews as $review)
                                <tr id="review-row-{{ $review->id }}">
                                    <td>{{ $review->id }}</td>
                                    <td>{{ $review->user_id }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm view-details-btn" data-id="{{ $review->id }}">View</button>
                                        @if($review->deleted_at)
                                            <button class="btn btn-danger btn-sm" disabled>Deleted</button>
                                        @else
                                            <button class="btn btn-danger btn-sm soft-delete-btn" data-id="{{ $review->id }}">Delete</button>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Hidden row for review details -->
                                <tr id="details-row-{{ $review->id }}" class="details-row" style="display: none;">
                                    <td colspan="3">
                                        <ul>
                                            <li><strong>Product ID:</strong> {{ $review->product_id }}</li>
                                            <li><strong>Rating:</strong> {{ $review->rating }}</li>
                                            <li><strong>Comment:</strong> {{ $review->comment }}</li>
                                            <li><strong>Created At:</strong> {{ $review->created_at }}</li>
                                            <li><strong>Deleted At:</strong> {{ $review->deleted_at ?? 'N/A' }}</li>
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
@endsection

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Toggle view details for reviews
        document.querySelectorAll('.view-details-btn').forEach(button => {
            button.addEventListener('click', () => {
                const reviewId = button.getAttribute('data-id');
                const detailsRow = document.querySelector(`#details-row-${reviewId}`);
                if (detailsRow.style.display === 'none') {
                    detailsRow.style.display = '';
                } else {
                    detailsRow.style.display = 'none';
                }
            });
        });

        // Handle soft delete for reviews
        document.querySelectorAll('.soft-delete-btn').forEach(button => {
            button.addEventListener('click', async () => {
                const reviewId = button.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action will soft delete the review!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, soft delete it!',
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const response = await fetch(`/customer/reviews/${reviewId}/soft-delete`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Content-Type': 'application/json',
                                }
                            });

                            if (response.ok) {
                                const data = await response.json();
                                if (data.success) {
                                    Swal.fire('Deleted!', 'Review has been soft deleted.', 'success');
                                    const row = document.querySelector(`#review-row-${reviewId}`);
                                    row.classList.add('text-muted');
                                    button.disabled = true;
                                    button.innerText = 'Deleted';
                                } else {
                                    Swal.fire('Error', 'Failed to delete review.', 'error');
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
    });
</script>
@endpush
