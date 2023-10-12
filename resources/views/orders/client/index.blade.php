<x-app-layout>
    <div>
        <div class="p-6 rounded-xl bg-white shadow-sm m-6">
            <h1 class="text-5xl">Pedidos</h1>
            @foreach ($orders as $order)
            <div class="p-6 m-6">
                <h1 class="text-4xl">Pedido {{ $order->id }}</h1>
                @foreach ($order->foods()->get() as $food)
                    <h1 class="text-4xl">{{ $food->name }}</h1>
                    <p>Preço: {{ $food->price_in_cents }}</p>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
