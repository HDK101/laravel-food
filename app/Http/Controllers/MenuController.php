<?php

namespace App\Http\Controllers;

use App\Http\Requests\SelectFoodRequest;
use Illuminate\Http\Request;
use App\Models\Food;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $selectedFoods = $request->session()->get('selectedFoods');
        $selectedFoodsCollection = collect($selectedFoods);

        $foodOrderMap = [];

        foreach ($selectedFoods as $food) {
            $foodOrderMap[$food['id']] = $food['quantity'];
        }

        $foodIds = $selectedFoodsCollection->map(function ($food) {
            return $food['id'];
        });

        $foodMap = [];

        $foods = Food::whereIn('id', $foodIds)->get();

        foreach ($foods as $food) {
            $foodMap[$food->id] = [
                'food' => $food,
                'quantity' => $foodOrderMap[$food->id],
            ];
        }

        return view('menu.index', [
            'selectedFoods' => $foodMap,
            'foods' => Food::all(),
        ]);
    }

    public function selectFood(SelectFoodRequest $request)
    {
        $selectedFoods = $request->session()->get('selectedFoods');

        if (!is_array($selectedFoods)) {
            $selectedFoods = [];
        }

        $food = Food::findOrFail($request->input('foodId'));
        $foodId = $food->id;

        $hasSelectedFood = collect($selectedFoods)->filter(function($selectedFood) use($foodId) {
            return $selectedFood['id'] == $foodId;
        });

        if (!$hasSelectedFood->count() > 0) {
            $selectedFoods[] = [
                'id' => $foodId,
                'quantity' => $request->input('quantity'),
            ];

            $request->session()->put('selectedFoods', $selectedFoods);
        }

        return redirect()->route('menu.index');
    }
}
