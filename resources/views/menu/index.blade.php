<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        {{ json_encode($selectedFoods) }}
        @foreach ($foods as $food)
        <div class="p-6 rounded-xl bg-white shadow-sm m-6">
            <h1 class="text-5xl">{{ $food->name }}</h1>
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
</x-app-layout>
