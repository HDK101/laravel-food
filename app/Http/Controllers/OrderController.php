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
        $this->authorize('canManageOrders', Order::class);

        return view('orders.admin.index', [
            'orders' => Order::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(Order $order)
    {
        $this->authorize('canManageOrders', Order::class);

        return view('orders.show', [
            'order' => $order,
        ]);
    }
}
