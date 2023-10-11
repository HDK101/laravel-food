<x-app-layout>
    <div>
        <form method="POST" action="{{ route('foods.store') }}">
            @csrf
            <input name="name" />
            <input type="number" name="price_in_cents" pattern="^\d*(\.\d{0,2})?$" step=".01" min="0" />
            <input type="submit" />
        </form>
    </div>
</x-app-layout>
