<x-layout>
    <x-user-navbar>
        @foreach ($categories as $category)
            <a href="/user-dashboard/{{$category->id}}">{{$category->name}}</a>
        @endforeach
    </x-user-navbar>
    <div class="w-full px-24">
                @if ($stock_filtered === NULL)
                    
                @else
                <h1 class="font-bold text-3xl mb-4 mt-12">Alle Angebote aus der Kategorie:  {{$current_category[0]->name}}</h1>
                <div class="grid grid-cols-7 text-center border-b-2 pb-2 font-semibold">
                    <p>Bild</p>
                    <p>Name</p>
                    <p>Artikelnummer</p>
                    <p>Preis</p>
                    <p>Preis reduziert</p>
                    <p>Mhd</p>
                    <p>Bestand</p>
                </div>
                @for ($i = 0; $i < count($stock_filtered); $i++)
                @if (count($stock_filtered[$i]) >= 2)
                    @foreach ($stock_filtered[$i] as $p)
                        <div class="grid grid-cols-7 py-4 px-4 border-b-2 text-center relative">
                            @foreach ($products_info[$i] as $product_info)
                            <div>{{$product_info->image}}</div>
                            <div>{{$product_info->name}}</div>
                            <div>{{$product_info->product_number}}</div>
                            @endforeach
        
                            <div class="text-red-500 line-through">{{$p->price}}€</div>
                            <div>{{$p->price_reduced}}€</div>
                            <div>{{$p->mhd}}</div>
                            <div>{{$p->stock}}</div>
                            <a class="text-3xl font-bold text-green-500 hover:text-4xl hover:text-green-600 absolute top-1 right-6" href="{{ route('add.to.cart', $p->id) }}">+</a>
                        </div> 
                    @endforeach

                    
                @else
                <div class="grid grid-cols-7 py-4 px-4 border-b-2 text-center relative">
                    @foreach ($products_info[$i] as $product_info)
                    <div>{{$product_info->image}}</div>
                    <div>{{$product_info->name}}</div>
                    <div>{{$product_info->product_number}}</div>
                    @endforeach

                    <div class="text-red-500 line-through">{{$stock_filtered[0][$i]->price}}€</div>
                    <div>{{$stock_filtered[0][$i]->price_reduced}}€</div>
                    <div>{{$stock_filtered[0][$i]->mhd}}</div>
                    <div>{{$stock_filtered[0][$i]->stock}}</div>
                    <a class="text-3xl font-bold text-green-500 hover:text-4xl hover:text-green-600 absolute top-1 right-6" href="{{ route('add.to.cart', $stock_filtered[0][$i]->id) }}">+</a>
                </div> 
                @endif
                @endfor
                @endif
            

    </div>
</x-layout>
