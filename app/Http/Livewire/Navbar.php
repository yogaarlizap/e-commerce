<?php

namespace App\Http\Livewire;

use App\Kategori;
use App\Pesanan;
use App\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Navbar extends Component
{
    public $jumlah = 0;

    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang'
    ];

    public function updateKeranjang()
    {
        if(Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            if($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }else {
                $this->jumlah = 0;
            }
        }
    }

    public function mount()
    {
        if(Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            if($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }else {
                $this->jumlah = 0;
            }
        }

    }

    public function render()
    {
        $categories = Http::get("http://127.0.0.1:8000/api/v1/product-categories");
        $storeName = Http::get("http://127.0.0.1:8000/api/v1/my-store");
        return view('livewire.navbar',[
            'store_detail' => json_decode($storeName),
            'categories' => json_decode($categories),
            'jumlah_pesanan' => $this->jumlah,
        ]);
    }
}
