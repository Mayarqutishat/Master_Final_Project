@extends('layouts.master')

@section('title', 'Payments List')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Payments List</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>Payment Method</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="paymentsTableBody">
                            @foreach($payments as $payment)
                                <tr id="payment-row-{{ $payment->id }}" class="{{ $payment->deleted_at ? 'text-muted' : '' }}">
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->order_id }}</td>
                                    <td>{{ $payment->payment_method }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm view-details-btn" data-id="{{ $payment->id }}">View</button>
                                        @if($payment->deleted_at)
                                            <button class="btn btn-danger btn-sm" disabled>Deleted</button>
                                        @else
                                            <button class="btn btn-danger btn-sm soft-delete-btn" data-id="{{ $payment->id }}">Delete</button>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Hidden row for payment details -->
                                <tr id="details-row-{{ $payment->id }}" class="details-row" style="display: none;">
                                    <td colspan="4">
                                        <ul>
                                            <li><strong>Amount:</strong> {{ $payment->amount }}</li>
                                            <li><strong>Status:</strong> {{ $payment->status }}</li>
                                            <li><strong>Transaction ID:</strong> {{ $payment->transaction_id }}</li>
                                            <li><strong>Processed At:</strong> {{ $payment->processed_at }}</li>
                                            <li><strong>Deleted At:</strong> {{ $payment->deleted_at ?? 'N/A' }}</li>
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
        // Toggle view details for payments
        document.querySelectorAll('.view-details-btn').forEach(button => {
            button.addEventListener('click', () => {
                const paymentId = button.getAttribute('data-id');
                const detailsRow = document.querySelector(`#details-row-${paymentId}`);
                if (detailsRow.style.display === 'none') {
                    detailsRow.style.display = '';
                } else {
                    detailsRow.style.display = 'none';
                }
            });
        });

        // Handle soft delete for payments
        document.querySelectorAll('.soft-delete-btn').forEach(button => {
            button.addEventListener('click', async () => {
                const paymentId = button.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action will soft delete the payment record!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, soft delete it!',
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const response = await fetch(`/customer/payments/${paymentId}/soft-delete`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Content-Type': 'application/json',
                                }
                            });

                            if (response.ok) {
                                const data = await response.json();
                                if (data.success) {
                                    Swal.fire('Deleted!', 'Payment record has been soft deleted.', 'success');
                                    const row = document.querySelector(`#payment-row-${paymentId}`);
                                    row.classList.add('text-muted');
                                    button.disabled = true;
                                    button.innerText = 'Deleted';
                                } else {
                                    Swal.fire('Error', 'Failed to delete payment record.', 'error');
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
