<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Checkout extends Component
{
    public $total_harga, $nohp, $alamat;

    public function mount()
    {
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        $this->nohp = Auth::user()->nohp;
        $this->alamat = Auth::user()->alamat;

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(!empty($pesanan))
        {
            $this->total_harga = $pesanan->total_harga+$pesanan->kode_unik;
        }else {
            return redirect()->route('home');
        }
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'nohp' => 'required',
            'alamat' => 'required'
        ]);

        Http::withBody([
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        ])->post("http://127.0.0.1:8000/api/checkout");

        $this->emit('masukKeranjang');

        session()->flash('message', "Sukses Checkout");

        return redirect()->route('history');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
