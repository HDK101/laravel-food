<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientOrder;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

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

        $selectedFoods = $request->session()->get('selectedFoods');

        $order = Order::create();
        $order->client()->associate(Auth::user());

        foreach ($selectedFoods as $food) {
            $order->foods()->create([
                'name' => $food['name'],
                'quantity' => $food['quantity'],
                'price_in_cents' => $food['price_in_cents'],
            ]);
        }

        return redirect()->route('orders.client');
    }
}
