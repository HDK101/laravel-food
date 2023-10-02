<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('index', Order::class);

        return view('orders.index', [
            'orders' => Order::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(Order $order)
    {
        $this->authorize('show', Order::class);

        return view('orders.show', [
            'order' => $order,
        ]);
    }
}
