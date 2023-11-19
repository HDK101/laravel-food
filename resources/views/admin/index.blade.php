<x-app-layout>
    <div>
        <div class="p-6 rounded-xl bg-white shadow-sm m-6">
            <a href="{{ route('admins.create') }}">Criar</a>
        </div>
        @foreach ($admins as $admin)
            <div class="p-6 rounded-xl bg-white shadow-sm m-6">
                <h1 class="text-4xl font-bold">{{ $admin->name }}</h1>
                <p>Nome: {{ $admin->name }}</p>
                <div class="flex flex-col gap-5">
                    <form method="POST" action="{{ route('admins.destroy', $admin->id) }}">
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
