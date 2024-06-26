@foreach ($products->get() as $product)

    <div class='p-4 rounded bg-gray-300 w-full'>
        <img src={{$product->imageURL}} alt={{$product->name}} class='w-full h-48 object-cover rounded mb-4'>
        <h3 class='text-2xl'>{{$product->name}}</h3>
        <hr />
        <div class='italic text-gray-500 mb-4'>
            {{$product->description}}
        </div>
        <div class='text-4xl text-right'>{{$product->price}}</div>
    </div>

@endforeach

<div id="name_error" hx-swap-oob="true" >
</div>

<div id="description_error" hx-swap-oob="true" >
</div>

<div id="img_error" hx-swap-oob="true" >
</div>

<div id="price_error" hx-swap-oob="true" >
</div>

<div id="addProductMessage" hx-swap-oob="true">
    <div class="bg-green-500 text-white text-center p-4">
        <h3>Product Added</h3>
    </div>
</div>


