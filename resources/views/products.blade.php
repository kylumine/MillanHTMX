@extends('base')

@section('content')

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center">
            <h1 class="text-4xl inline-block">Products</h1>
            <button
            class="ml-4 px-4 py-2 bg-blue-500 text-white rounded"
            data-bs-toggle="modal" data-bs-target="#modal">Add Product</button>
        </div>
        <form
            hx-get="/api/products"
            hx-trigger="submit"
            hx-swap="innerHTML"
            hx-target="#product-list"
            class="ml-4">
            <input type="text" name="filter" placeholder="Search products..." class="p-2 border border-gray-300 rounded" autocomplete="off">
        </form>
    </div>

    <hr class="mb-6">

    <div id="product-list"
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
        hx-get="/api/products"
        hx-trigger="load"
        hx-swap="innerHTML">
    </div>
</div>

<!-- Modal Form -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productForm"
                    hx-trigger="submit"
                    hx-post="/store/products"
                    hx-target="#product-list"
                    hx-swap="innerHTML"
                    hx-on::after-request="this.reset()" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Name</label>
                        <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded">
                        <div id="name_error"></div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Description</label>
                        <textarea name="description" class="w-full p-2 border border-gray-300 rounded"></textarea>
                        <div id="description_error"></div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Price</label>
                        <input type="number" name="price" step="0.01" class="w-full p-2 border border-gray-300 rounded">
                        <div id="price_error"></div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Image URL</label>
                        <input type="text" name="imageURL" class="w-full p-2 border border-gray-300 rounded">
                        <div id="img_error"></div>
                    </div>
                </form>
            </div>

            <div id="addProductMessage" hx-swap-oob="true"></div>

            <div class="modal-footer">
                <button type="submit" form="productForm" class="px-4 py-2 bg-green-500 text-white rounded">Save</button>
                <button type="button" class="px-4 py-2 bg-red-500 text-white rounded" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
