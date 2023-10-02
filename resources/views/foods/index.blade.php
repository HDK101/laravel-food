<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <div class="p-6 rounded-xl bg-white shadow-sm m-6">
            <a href="{{ route('foods.create') }}">Criar</a>
        </div>
        @foreach ($foods as $food)
        <div class="p-6 rounded-xl bg-white shadow-sm m-6">
            <h1 class="text-5xl">{{ $food->name }}</h1>
            <p>Preço: {{ $food->formattedPrice() }}</p>
            <p>Modificado em {{ $food->updated_at }}</p>
            <a href="{{ route('foods.edit', $food->id) }}">Editar</a>
            <form method="POST" action="{{ route('foods.destroy', $food->id) }}">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" value="Deletar">
            </form>
        </div>
        @endforeach
    </div>
</x-app-layout>