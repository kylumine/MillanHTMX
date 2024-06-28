@include('templates._products-list-for-create', ['products' => $products]);

<div id="addProductMessage" hx-swap-oob="true">
    <div class="bg-green-500 text-white text-center p-4">
        <h3>Product Added</h3>
    </div>
</div>
