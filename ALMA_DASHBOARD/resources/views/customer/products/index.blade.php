@extends('layouts.master')
@section('title', 'Product List')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product List</h4>
                    <button class="btn btn-success mb-3" id="addProductBtn">Add New Product</button>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="productTableBody">
                                @foreach($products as $product)
                                    <tr id="product-row-{{ $product->id }}" class="{{ $product->deleted_at ? 'text-muted' : '' }}">
                                        <td>{{ $product->id }}</td>
                                        <td class="product-name">{{ $product->name }}</td>
                                        <td class="product-description">{{ $product->description }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm view-details-btn" data-id="{{ $product->id }}">View</button>
                                            <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-description="{{ $product->description }}" data-price="{{ $product->price }}" data-stock="{{ $product->stock }}" data-category="{{ $product->category_id }}">Edit</button>
                                            @if($product->deleted_at)
                                                <button class="btn btn-danger btn-sm" disabled>Deleted</button>
                                            @else
                                                <button class="btn btn-danger btn-sm soft-delete-btn" data-id="{{ $product->id }}">Delete</button>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr id="details-row-{{ $product->id }}" class="details-row" style="display: none;">
                                        <td colspan="4">
                                            <ul>
                                                <li><strong>Product Name:</strong> {{ $product->name }}</li>
                                                <li><strong>Description:</strong> {{ $product->description }}</li>
                                                <li><strong>Price:</strong> {{ $product->price }}</li>
                                                <li><strong>Stock:</strong> {{ $product->stock }}</li>
                                                <li><strong>Category:</strong> {{ $product->category_id }}</li>
                                                <li><strong>Created At:</strong> {{ $product->created_at }}</li>
                                                <li><strong>Updated At:</strong> {{ $product->updated_at }}</li>
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

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="addProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="addProductName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="addProductDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="addProductDescription" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="addProductPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="addProductPrice" name="price" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="addProductStock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="addProductStock" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="addProductCategory" class="form-label">Category ID</label>
                            <input type="number" class="form-control" id="addProductCategory" name="category_id" required>
                        </div>
                        <button type="submit" class="btn btn-success">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editProductId" name="id">
                        <div class="mb-3">
                            <label for="editProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="editProductName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editProductDescription" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editProductPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="editProductPrice" name="price" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductStock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="editProductStock" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductCategory" class="form-label">Category</label>
                            <select class="form-control" id="editProductCategory" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Add product modal toggle
        document.getElementById('addProductBtn').addEventListener('click', () => {
            new bootstrap.Modal(document.getElementById('addProductModal')).show();
        });

        // View product details
        document.querySelectorAll('.view-details-btn').forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.getAttribute('data-id');
                const detailsRow = document.getElementById(`details-row-${productId}`);
                if (detailsRow.style.display === 'none') {
                    detailsRow.style.display = 'table-row';
                } else {
                    detailsRow.style.display = 'none';
                }
            });
        });

        // Edit product modal
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.getAttribute('data-id');
                const productName = button.getAttribute('data-name');
                const productDescription = button.getAttribute('data-description');
                const productPrice = button.getAttribute('data-price');
                const productStock = button.getAttribute('data-stock');
                const productCategoryId = button.getAttribute('data-category');

                document.getElementById('editProductId').value = productId;
                document.getElementById('editProductName').value = productName;
                document.getElementById('editProductDescription').value = productDescription;
                document.getElementById('editProductPrice').value = productPrice;
                document.getElementById('editProductStock').value = productStock;
                document.getElementById('editProductCategory').value = productCategoryId;

                new bootstrap.Modal(document.getElementById('editProductModal')).show();
            });
        });

        // Add product submission
        document.getElementById('addProductForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const form = new FormData(e.target);
            try {
                const response = await fetch(`/customer/products/${productId}/soft-delete`, {
                    method: 'POST',
                    body: form,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    if (data.success) {
                        Swal.fire({
                            title: 'Success',
                            text: 'Product added successfully.',
                            icon: 'success',
                            willClose: () => {
                                location.reload();
                            }
                        });
                    }
                }
            } catch (error) {
                Swal.fire('Error', 'An error occurred while adding the product.', 'error');
            }
        });

        // Edit product form submission
        document.getElementById('editProductForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const form = new FormData(e.target);
            const productId = document.getElementById('editProductId').value;

            try {
                const response = await fetch(`/customer/products/${productId}`, {  // Changed to /customer/products/{productId}
                    method: 'PUT',
                    body: form,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    if (data.success) {
                        Swal.fire('Success', 'Product updated successfully.', 'success');

                        // Update the table row with new product data
                        const row = document.getElementById(`product-row-${productId}`);
                        row.querySelector('.product-name').textContent = data.product.name;
                        row.querySelector('.product-description').textContent = data.product.description;
                        row.querySelector('.product-price').textContent = `$${data.product.price}`;
                        row.querySelector('.product-stock').textContent = data.product.stock;
                        row.querySelector('.product-category').textContent = data.product.category_name;

                        // Close the modal
                        new bootstrap.Modal.getInstance(document.getElementById('editProductModal')).hide();
                    }
                }
            } catch (error) {
                Swal.fire('Error', 'An error occurred while updating the product.', 'error');
            }
        });

        document.querySelectorAll('.soft-delete-btn').forEach(button => {
            button.addEventListener('click', async () => {
                const productId = button.getAttribute('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action will soft delete the product!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, soft delete it!'
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const response = await fetch(`/customer/products/${productId}/soft-delete`, {  // Changed to /customer/products/{productId}/soft-delete
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Content-Type': 'application/json'
                                }
                            });

                            const data = await response.json();
                            if (data.success) {
                                Swal.fire('Deleted!', 'Product has been soft deleted.', 'success');
                                // Update the UI to reflect the soft delete (disable button and gray out row)
                                const row = document.querySelector(`#product-row-${productId}`);
                                row.classList.add('text-muted');
                                row.querySelector('.soft-delete-btn').setAttribute('disabled', 'true');
                                row.querySelector('.soft-delete-btn').innerText = 'Deleted';
                            } else {
                                Swal.fire('Error', 'An error occurred while deleting the product.', 'error');
                            }
                        } catch (error) {
                            Swal.fire('Error', 'An error occurred while deleting the product.', 'error');
                        }
                    }
                });
            });
        });
    });
</script>
@endpush
