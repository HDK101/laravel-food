<x-app-layout>
    <div>
        <form method="POST" action="{{ route('foods.store') }}">
            @csrf
            <input name="name" value="{{ $food->name }}" />
            <input type="number" name="price_in_cents" pattern="^\d*(\.\d{0,2})?$" step=".01" min="0" value="{{ $food->price_in_cents / 100 }}" />
            <input type="submit" />
        </form>
    </div>
</x-app-layout>
