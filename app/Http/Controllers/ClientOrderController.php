<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientOrder;
use App\Models\Food;
use App\Models\FoodOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ClientOrderController extends Controller
{
    public function index() {
        $this->authorize('canOrder', Order::class);

        return view('orders.client.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('canOrder', Order::class);

        return view('orders.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientOrder $request)
    {
        $this->authorize('canOrder', Order::class);

        $order = Order::create();

        $foods = Food::where('id', $request->food_ids)->get();

        $foodsOrder = collect();

        foreach ($foods as $food) {
            $foodOrder = $order->foods()->create($food);
            $foodsOrder->concat($foodOrder);
        }

        dd($foodsOrder);

        return redirect()->route('orders.client');
    }
}
