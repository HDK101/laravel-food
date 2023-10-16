<x-app-layout>
    <div>
        <div class="p-6 rounded-xl bg-white shadow-sm m-6">
            <h1 class="text-5xl">Meus Pedidos</h1>
            @foreach ($orders as $order)
            <div class="p-6 m-6 rounded border-2 flex flex-col gap-2">
                <h1 class="text-4xl">Pedido {{ $order->id }}</h1>
                <p>Valor total: {{ $order->totalPriceFormatted() }}</p>
                <div>
                    @foreach ($order->foods()->get() as $food)
                    <h1 class="text-4xl">{{ $food->name }}</h1>
                    <p>Quantidade: {{ $food->quantity }}</p>
                    <p>Preço: {{ $food->formattedPrice() }}</p>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
