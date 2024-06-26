@include('templates._products-list-for-create', ['products' => $products]);

<div id="addProductMessage" hx-swap-oob="true">
    <div class="text-red-800 p-4">
        <div>Fix the following:</div>
        <ul class="ms-2">
            @foreach ($errors as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

</div>
