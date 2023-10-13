<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ClientOrderController extends Controller
{
    public function index() {
        $this->authorize('canOrder', Order::class);

        $orders = Auth::user()->orders()->with(['foods', 'client'])->get();

        return view('orders.client.index', [
            'orders' => $orders,
        ]);
    }

    public function store(StoreClientOrder $request)
    {
        $this->authorize('canOrder', Order::class);

        $selectedFoods = $request->session()->get('selectedFoods');

        $request->session()->remove('selectedFoods');

        $order = Auth::user()->orders()->create();

        foreach ($selectedFoods as $food) {
            $order->foods()->create([
                'name' => $food['name'],
                'quantity' => $food['quantity'],
                'price_in_cents' => $food['price_in_cents'],
            ]);
        }

        return redirect()->route('client.order.index');
    }
}
