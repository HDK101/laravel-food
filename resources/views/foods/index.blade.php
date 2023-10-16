<x-app-layout>
    <div>
        <div class="p-6 rounded-xl bg-white shadow-sm m-6">
            <a href="{{ route('foods.create') }}">Criar</a>
        </div>
        @foreach ($foods as $food)
            <div class="p-6 rounded-xl bg-white shadow-sm m-6">
                <img class="d-block w-1/3 rounded-lg m-2" src="{{ asset("storage/images/$food->filename") }}"
                    alt="">
                <h1 class="text-4xl font-bold">{{ $food->name }}</h1>
                <p>Preço: {{ $food->formattedPrice() }}</p>
                <p>Modificado em {{ $food->updated_at }}</p>
                <div class="flex flex-col gap-5">
                    <a class="w-20 block rounded-lg bg-red-500 p-5 font-bold text-white"
                        href="{{ route('foods.edit', $food->id) }}">Editar</a>
                    <form method="POST" action="{{ route('foods.destroy', $food->id) }}">
                        @csrf
                        @method('DELETE')
                        <input class="w-20 block rounded-lg bg-red-500 p-5 font-bold text-white" type="submit"
                            value="Deletar">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
