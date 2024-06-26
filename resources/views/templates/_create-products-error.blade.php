@include('templates._products-list-for-create', ['products' => $products]);

@if ($errors->has('name'))
    <div id="name_error" hx-swap-oob="true">
        <div class="bg-red-200 text-red-800">
            <ul class="ms-2">
                @foreach ($errors->get('name') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if ($errors->has('description'))
    <div id="description_error" hx-swap-oob="true">
        <div class="bg-red-200 text-red-800">
            <ul class="ms-2">
                @foreach ($errors->get('description') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if ($errors->has('price'))
    <div id="price_error" hx-swap-oob="true">
        <div class="bg-red-200 text-red-800">
            <ul class="ms-2">
                @foreach ($errors->get('price') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if ($errors->has('imageURL'))
    <div id="img_error" hx-swap-oob="true">
        <div class="bg-red-200 text-red-800">
            <ul class="ms-2">
                @foreach ($errors->get('imageURL') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div id="addProductMessage" hx-swap-oob="true">

</div>

