<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'nohp' => 'required',
            'alamat' => 'required'
        ]);

        Http::withBody(json_encode([
            'user_id' => $request->user_id,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        ]), "application/json")->post("http://127.0.0.1:8000/api/checkout");

        session()->flash('message', "Sukses Checkout");

        return redirect()->route('history');
    }
}
