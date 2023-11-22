<x-app-layout>
    <div class="m-5 p-5 bg-white rounded-xl shadow-sm w-1/4">
        <form class="flex flex-col gap-5" method="POST" action="{{ route('admins.destroy', $admin->id) }}">
            @csrf
            @method("PUT")
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" value="{{ $admin->name }}" class="block mt-1 w-full" type="text" name="name" required />

            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" value="{{ $admin->email }}" class="block mt-1 w-full" type="text" name="email" required />

            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                autocomplete="current-password" />

            <input class="w-20 block rounded-lg bg-red-500 p-5 font-bold text-white" type="submit" value="Editar">
        </form>
    </div>
</x-app-layout>
