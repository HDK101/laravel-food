<x-app-layout>
    <div class="m-5 p-5 bg-white rounded-xl shadow-sm w-1/4">
        <form class="flex flex-col gap-5" method="POST" action="{{ route('foods.store') }}" enctype="multipart/form-data">
            @csrf
            <x-input-label for="name" :value="__('Nome')" />

            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required value="{{ $food->name}}" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <x-input-label for="price_in_cents" :value="__('Preço')" />

            <x-text-input id="price_in_cents" class="block mt-1 w-full" step=".01" min="0" pattern="^\d*(\.\d{0,2})?$" type="number" name="price_in_cents" required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <input type="file" name="image">
            <input class="w-20 block rounded-lg bg-red-500 p-5 font-bold text-white" type="submit"
            value="Criar">
        </form>
    </div>
</x-app-layout>
