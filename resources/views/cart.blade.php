<x-layout>
    <x-user-navbar></x-user-navbar>
    <div class="w-full flex flex-col px-24">
        <h1 class="font-bold text-3xl my-4">Dein Warenkorb</h1>
        <div class="grid grid-cols-5 text-center border-b-2 pb-2 font-semibold">
            <p>Bild</p>
            <p>Name</p>
            <p>Preis</p>
            <p>Preis reduziert</p>
            <p>Anzahl</p>
        </div>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
            <div class="grid grid-cols-5 py-4 px-4 border-b-2 text-center relative">
                <div>{{$details['image']}}</div>
                <div>{{$details['name']}}</div>
                <div class="text-red-500 line-through">{{$details['price']}}€</div>
                <div>{{$details['price_reduced']}}€</div>
                <div>{{$details['quantity']}}</div>
                <a class="text-3xl font-bold text-red-500 hover:text-4xl hover:text-red-600 absolute right-6 " href="{{route('remove.from.cart', $id)}}">-</a>
            </div>
            @endforeach
        @endif
    </div>
</x-layout>
