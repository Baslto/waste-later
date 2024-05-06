<x-layout>
    <x-admin-navbar></x-admin-navbar>
    <div class="w-full px-24">
        <h1 class="font-bold text-3xl my-4">Verwalte die Angebote in deinem Markt!</h1>
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
            
            <div class="grid grid-cols-7 py-4 px-4 border-b-2 text-center">
                @foreach ($products_info[$i] as $product_info)
                <div>{{$product_info->image}}</div>
                <div>{{$product_info->name}}</div>
                <div>{{$product_info->product_number}}</div>
                @endforeach
                <div class="text-red-500 line-through">{{$market_products[$i]->price}}€</div>
                <div>{{$market_products[$i]->price_reduced}}€</div>
                <div>{{$market_products[$i]->mhd}}</div>
                <div>{{$market_products[$i]->stock}}</div>
            </div>
        @endfor
    </div>
    <div class="absolute bottom-6 right-8">
        <button id="create-store-product" class="rounded-md font-semibold text-white bg-blue-500 hover:bg-blue-400 cursor-pointer py-2 px-8">Angebot erstellen</button>
    </div>
    
    <div id="create-store-product-modal" class="hidden w-screen h-screen absolute top-0 left-0 z-10 flex justify-center items-center bg-gray-900/75">
        <div class="w-[600px] h-[500px] bg-gray-800 rounded-xl text-center relative">
            <h1 class="font-semibold text-3xl text-white mt-8 mb-8">Angebot erstellen</h1>
            <img id="create-store-product-close" class="w-6 h-6 cursor-pointer hover:scale-110 absolute top-8 right-8" src="xmark-solid.svg" alt="">
            <form action="/create-store-product" method="post" class="flex flex-col gap-y-2 px-12">
                @csrf
                <div>
                    <div class="flex items-center">
                      <label for="product" class="block text-md text-white font-medium leading-6">Produkt auswählen</label>
                    </div>
                    <div class="mt-2">
                        <select id="product" name="product" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @foreach ($products as $product)
                               <option value="{{$product->id}}">{{$product->name}}</option> 
                            @endforeach
                          </select>
                    </div>
                </div>
                <div>
                    <div class="flex items-center">
                      <label for="amount" class="block text-md text-white font-medium leading-6 text-gray-900">Menge</label>
                    </div>
                    <div class="mt-2">
                      <input id="amount" name="amount" type="text" required class="block w-1/4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="flex">
                    <div class="w-[50%]">
                        <div class="flex items-center">
                          <label for="price" class="block text-md text-white font-medium leading-6">Preis</label>
                        </div>
                        <div class="flex mt-2 text-white items-center">
                            <input id="price" name="price" type="text" required class="block mr-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <div>€</div>
                        </div>
                    </div>
    
                    <div class="w-[50%]">
                        <div class="flex items-center">
                          <label for="discount" class="block text-md text-white font-medium leading-6">Rabatt</label>
                        </div>
                        <div class="flex mt-2 ml-2 text-white items-center">
                            <input id="discount" name="discount" type="text" required class="block mr-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <div>%</div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center">
                      <label for="mhd" class="block text-md text-white font-medium leading-6 text-gray-900">Mindesthaltbarkeitsdatum</label>
                    </div>
                    <div class="mt-2">
                      <input id="mhd" name="mhd" type="date" required class="block w-fit rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="absolute bottom-6 right-8">
                    <button type="submit" class="rounded-md font-semibold text-white bg-blue-500 hover:bg-blue-700 cursor-pointer py-2 px-8">Erstellen</button>
                </div>
            </form>
        </div>
</x-layout>
