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
        $discount = $request->session()->get('cupomDiscount');

        $request->session()->remove('selectedFoods');
        $request->session()->remove('cupomDiscount');

        $order = Auth::user()->orders()->create([
            'coupon_discount' => $discount ?? 0,
        ]);

        foreach ($selectedFoods as $food) {
            $order->foods()->create([
                'name' => $food['name'],
                'quantity' => $food['quantity'],
                'price_in_cents' => $food['price_in_cents'],
                'cupom_discount' => $discount,
            ]);
        }
        return redirect()->route('client.order.index');
    }
}
