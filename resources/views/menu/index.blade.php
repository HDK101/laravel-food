<x-app-layout>
    <div>
        <div class="p-6 rounded-xl bg-white shadow-sm m-6">
            <h1 class="text-5xl">Carrinho</h1>
            @foreach ($selectedFoods as $selectedFood)
            <div class="p-6 m-6">
                <h1 class="text-4xl">{{ $selectedFood['food']->name }}</h1>
                <p>Preço: {{ $selectedFood['food']->formattedPrice() }}</p>
                <form method="POST" action="{{ route('menu.update') }}">
                    @csrf
                    <input type="number" name="quantity" min="1" value="{{ $selectedFood['quantity'] }}"/>
                    <input hidden type="number" name="foodId" value="{{ $selectedFood['food']->id }}" />
                    <input type="submit" value="Atualizar">
                </form>
                <form method="POST" action="{{ route('menu.remove') }}">
                    @csrf
                    <input hidden type="number" name="foodId" value="{{ $selectedFood['food']->id }}" />
                    <input type="submit" value="Remover">
                </form>
            </div>
            @endforeach
            <form action="/cart">
                <input type="submit" value="Finalizar compra">
            </form>
        </div>
        <div class="p-6 rounded-xl bg-white shadow-sm m-6 grid gap-4 flex">
            <h1 class="text-5xl">Cardápio</h1>
            @foreach ($foods as $food)
            <div class="p-6">
                <h1 class="text-4xl">{{ $food->name }}</h1>
                <p>Preço: {{ $food->formattedPrice() }}</p>
                <form method="POST" action="{{ route('menu.select') }}">
                    @csrf
                    <input hidden type="number" name="foodId" value="{{ $food->id }}" />
                    <input type="number" name="quantity" min="1" value="1"/>
                    <input type="submit" value="Adicionar">
                </form>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
