<x-app-layout>
    <div>
        <div class="p-6 rounded-xl bg-white shadow-sm m-6">
            <h1 class="text-5xl">Carrinho</h1>
            @foreach ($selectedFoods as $selectedFood)
            <div class="p-6 flex flex-col gap-6 m-6 rounded border-2">
                <h1 class="text-4xl">{{ $selectedFood['food']->name }}</h1>
                <img class="d-block w-1/6 rounded-lg m-2" src="{{ asset('storage/images/' . $selectedFood['food']->filename) }}" alt="{{$selectedFood['food']->name}}">
                <p class="rounded-xl border-gray-500 border-2 w-fit p-4">Preço: {{ $selectedFood['food']->formattedPrice() }}</p>
                <p class="rounded-xl border-gray-500 border-2 w-fit p-4">Total: {{ $selectedFood['food']->price() *  $selectedFood['quantity']}}</p>

                <form class="flex gap-2" method="POST" action="{{ route('menu.update') }}">
                    @csrf
                    <input class="rounded-xl border-2 w-16 p-4" type="number" name="quantity" min="1" value="{{ $selectedFood['quantity'] }}"/>
                    <input hidden type="number" name="foodId" value="{{ $selectedFood['food']->id }}" />
                    <button class="bg-red-600 p-4 rounded-xl font-bold text-white flex gap-2">
                        <i data-feather="edit-2" color="white"></i>
                        Atualizar
                    </button>
                </form>
                <form method="POST" action="{{ route('menu.remove') }}">
                    @csrf
                    <input hidden type="number" name="foodId" value="{{ $selectedFood['food']->id }}" />
                    <button class="bg-red-600 p-4 rounded-xl font-bold text-white flex gap-2">
                        <i data-feather="shopping-cart" color="white"></i>
                        Remover
                    </button>
                </form>
            </div>
            @endforeach
            <form method="POST" action="{{ route('client.order.store') }}">
                @csrf
                <button class="bg-red-600 p-4 rounded-xl font-bold text-white flex gap-2">
                    <i data-feather="check" color="white"></i>
                    Finalizar compra
                </button>
            </form>
        </div>
        <div class="p-6 rounded-xl bg-white shadow-sm m-6 grid gap-4 flex">
            <h1 class="text-5xl">Cardápio</h1>
            @foreach ($foods as $food)
            <div class="p-6 flex flex-col gap-6 rounded border-2">
                <img class="d-block w-1/3 rounded-lg m-2" src="{{ asset("storage/images/$food->filename") }}"
                alt="">
                <h1 class="text-4xl">{{ $food->name }}</h1>
                <p class="text-lg">Preço: {{ $food->formattedPrice() }}</p>
                <form class="flex gap-5" method="POST" action="{{ route('menu.select') }}">
                    @csrf
                    <input hidden type="number" name="foodId" value="{{ $food->id }}" />
                    <input class="rounded-xl border-2 w-16" type="number" name="quantity" min="1" value="1"/>
                    <button class="bg-red-600 p-4 rounded-xl font-bold text-white flex gap-2">
                        <i data-feather="shopping-cart" color="white"></i>
                        Adicionar
                    </button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
