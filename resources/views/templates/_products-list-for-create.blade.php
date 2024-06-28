@foreach ($products->get() as $product)
    <div id="product-{{$product->id}}" class='p-4 rounded bg-gray-300 w-full'>
        <img src="{{$product->imageURL}}" alt="{{$product->name}}" class='w-full h-48 object-cover rounded mb-4'>
        <h3 class='text-2xl'>{{$product->name}}</h3>
        <hr />
        <div class='italic text-gray-500 mb-4'>
            {{$product->description}}
        </div>
        <div class='flex mt-[5%]'>
            <div class='flex justify-start'>
                <button class='bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded ml-2' hx-get="/products/{{ $product->id }}/details" hx-target="#productDetailModal .modal-body" hx-trigger="click" data-bs-toggle="modal" data-bs-target="#productDetailModal">
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                        <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z'/>
                        <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0'/>
                    </svg>
                </button>
                <button class='bg-orange-500 hover:bg-orange-700 text-white font-bold p-2 rounded ml-2' hx-get="/products/{{ $product->id }}/edit" hx-target="#productEditModal .modal-body" hx-trigger="click" data-bs-toggle="modal" data-bs-target="#productEditModal">
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                    </svg>
                </button>
                <button class='bg-red-500 hover:bg-red-700 text-white font-bold p-2 rounded ml-2' hx-confirm="Are you sure you want to delete this product?" hx-delete='/api/products/{{$product->id}}' hx-target='#product-{{$product->id}}' hx-swap='delete' >
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                    <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
                    </svg>
                </button>
            </div>
            <div class='text-4xl ml-[30%]'>{{$product->price}}</div>
        </div>
    </div>
@endforeach

<div id="name_error" hx-swap-oob="true"></div>
<div id="description_error" hx-swap-oob="true"></div>
<div id="img_error" hx-swap-oob="true"></div>
<div id="price_error" hx-swap-oob="true"></div>

<!-- Product Detail Modal -->
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="productDetailModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Details will be loaded here dynamically using htmx -->
            </div>
        </div>
    </div>
</div>

<!-- Product Edit Modal -->
<div class="modal fade" id="productEditModal" tabindex="-1" aria-labelledby="productEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productEditModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit form will be loaded here dynamically using htmx -->
            </div>
        </div>
    </div>
</div>
