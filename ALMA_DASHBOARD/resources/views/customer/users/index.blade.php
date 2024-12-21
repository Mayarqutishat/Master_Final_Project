@extends('layouts.master')

@section('title', 'User List')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">My Profile: {{ $user->name }}</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <tr id="user-row-{{ $user->id }}" class="{{ $user->deleted_at ? 'text-muted' : '' }}">
                                <td>{{ $user->id }}</td>
                                <td>{{ e($user->name) }}</td>
                                <td>
                                    @if($user->image)
                                        <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm view-details-btn" data-id="{{ $user->id }}">View</button>
                                    @if($user->deleted_at)
                                        <button class="btn btn-danger btn-sm" disabled title="User is already deleted">Deleted</button>
                                    @else
                                        <button class="btn btn-danger btn-sm soft-delete-btn" data-id="{{ $user->id }}">Delete</button>
                                    @endif
                                </td>
                            </tr>
                            <tr id="details-row-{{ $user->id }}" class="details-row" style="display: none;">
                                <td colspan="4">
                                    <ul>
                                        <li><strong>Email:</strong> {{ e($user->email) }}</li>
                                        <li><strong>Role:</strong> {{ ucfirst($user->user_role) }}</li>
                                        <li><strong>Gender:</strong> {{ ucfirst($user->gender) }}</li>
                                        <li><strong>Age:</strong> {{ $user->age }}</li>
                                        <li><strong>Phone:</strong> {{ $user->phone }}</li>
                                        <li><strong>Address:</strong> {{ $user->address }}</li>
                                        <li><strong>Created At:</strong> {{ $user->created_at }}</li>
                                        <li><strong>Updated At:</strong> {{ $user->updated_at }}</li>
                                    </ul>
                                </td>
                            </tr>
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
        const tableBody = document.querySelector('#userTableBody');

        // Toggle view details for users
        tableBody.addEventListener('click', (e) => {
            if (e.target.classList.contains('view-details-btn')) {
                const userId = e.target.getAttribute('data-id');
                const detailsRow = document.querySelector(`#details-row-${userId}`);
                detailsRow.style.display = detailsRow.style.display === 'none' ? '' : 'none';
            }
        });

        // Handle soft delete for users
        tableBody.addEventListener('click', async (e) => {
            if (e.target.classList.contains('soft-delete-btn')) {
                const userId = e.target.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action will soft delete the user!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, soft delete it!',
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const response = await fetch(`/customer/users/${userId}/soft-delete`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Content-Type': 'application/json',
                                },
                            });

                            if (response.ok) {
                                const data = await response.json();
                                if (data.success) {
                                    Swal.fire('Deleted!', 'User has been soft deleted.', 'success');
                                    const row = document.querySelector(`#user-row-${userId}`);
                                    row.classList.add('text-muted');
                                    e.target.disabled = true;
                                    e.target.innerText = 'Deleted';
                                } else {
                                    Swal.fire('Error', 'Failed to delete user.', 'error');
                                }
                            } else {
                                Swal.fire('Error', 'Failed to communicate with the server.', 'error');
                            }
                        } catch (error) {
                            Swal.fire('Error', 'Network error. Failed to communicate with the server.', 'error');
                        }
                    }
                });
            }
        });
    });
</script>
@endpush
