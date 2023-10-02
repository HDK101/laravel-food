<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <form method="POST" action="{{ route('foods.store') }}">
            @csrf
            <input name="name" />
            <input type="number" name="price_in_cents" pattern="^\d*(\.\d{0,2})?$" step=".01" min="0" />
            <input type="submit" />
        </form>
    </div>
</x-app-layout>