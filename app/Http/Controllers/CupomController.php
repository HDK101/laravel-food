<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cupom;

class CupomController extends Controller
{
    public function index()
    {
        return view('cupom.index');
    }

    public function aplicarCupom(Request $request)
    {
        $selectedFoods = $request->session()->get('selectedFoods');
        $codigoCupom = $request->input('codigo');

        $cupom = Cupom::where('code', $codigoCupom)->first();

        $request->session()->put('cupomDiscount', $cupom->discount_percent  ?? 0);
        return redirect()->route('menu.index');
    }
}

