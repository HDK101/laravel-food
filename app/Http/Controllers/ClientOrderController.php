<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientOrderController extends Controller
{
    public function index() {
        return view('orders.client.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('orders.client');
    }
}
