<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('canAccessFood', Food::class);

        $foods = Food::all();
        return view('foods.index', [
            'foods' => $foods,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('canAccessFood', Food::class);

        return view('foods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodRequest $request)
    {
        $this->authorize('canAccessFood', Food::class);

        $price = $request->input('price_in_cents');

        Food::create([
            ...$request->input(),
            'price_in_cents' => $price * 100,
        ]);
        return redirect()->route('foods.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        $this->authorize('canAccessFood', Food::class);

        return view('foods.show', [
            'food' => $food,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        $this->authorize('canAccessFood', Food::class);

        return view('foods.edit', [
            'food' => $food,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $this->authorize('canAccessFood', Food::class);

        $food->fill($request->input());
        $food->save();
        return redirect()->route('foods.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $this->authorize('canAccessFood', Food::class);

        $food->delete();
        return redirect()->route('foods.index');
    }
}
