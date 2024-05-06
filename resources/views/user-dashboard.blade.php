<x-layout>
    <x-user-navbar>
        @foreach ($categories as $category)
            <a href="/user-dashboard/{{$category->id}}">{{$category->name}}</a>
        @endforeach
    </x-user-navbar>
    <div class="w-full px-24">
        @if(!$bool == false)
            <h1 class="font-bold text-3xl mb-4 mt-12">Angebote aus Märkten in deiner Nähe</h1>
            <div class="grid grid-cols-7 text-center border-b-2 pb-2 font-semibold">
                <p>Bild</p>
                <p>Name</p>
                <p>Artikelnummer</p>
                <p>Preis</p>
                <p>Preis reduziert</p>
                <p>Mhd</p>
                <p>Bestand</p>
            </div>
            @for ($i = 0; $i < count($market_products); $i++)
                
                <div class="grid grid-cols-7 py-4 px-4 border-b-2 text-center relative">
                    @foreach ($products_info[$i] as $product_info)
                    <div>{{$product_info->image}}</div>
                    <div>{{$product_info->name}}</div>
                    <div>{{$product_info->product_number}}</div>
                    @endforeach
                    <div class="text-red-500 line-through">{{$market_products[$i]->price}}€</div>
                    <div>{{$market_products[$i]->price_reduced}}€</div>
                    <div>{{$market_products[$i]->mhd}}</div>
                    <div>{{$market_products[$i]->stock}}</div>
                    <a class="text-3xl font-bold text-green-500 hover:text-4xl hover:text-green-600 absolute top-1 right-6" href="{{ route('add.to.cart', $market_products[$i]->id) }}">+</a>
                </div>
            @endfor
        @endif

    </div>
</x-layout>
