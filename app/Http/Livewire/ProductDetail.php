<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\PesananDetail;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $nama, $jumlah_pesanan, $nomor, $tujuan, $ongkir;

    public function mount($id)
    {
        $productDetail = Product::find($id);

        if($productDetail) {
            $this->product = $productDetail;
        }
    }

    public function masukkanKeranjang()
    {
        $this->validate([
            'jumlah_pesanan' => 'required'
        ]);

        //Validasi Jika Belum Login
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        //Menghitung Total berat
        
        $total_berat = $this->jumlah_pesanan*2;

        //Menghitung ongkir
        if($tujuan='bandung'){
            $ongkir = $total_berat*11000;
        }
        elseif($tujuan='jakarta barat'){
            $ongkir = $total_berat*7000;
        }
        elseif($tujuan='jakarta pusat'){
            $ongkir = $total_berat*7000;
        }
        elseif($tujuan='jakarta timur'){
            $ongkir = $total_berat*7000;
        }
        elseif($tujuan='jakarta utara'){
            $ongkir = $total_berat*7000;
        }
        elseif($tujuan='jakarta selatan'){
            $ongkir = $total_berat*7000;
        }
        elseif($tujuan='kepulauan seribu'){
            $ongkir = $total_berat*7000;
        }
        else{
            $ongkir = $total_berat*11000;
        }

        //Menghitung Total Harga
        
        $total_harga = $this->jumlah_pesanan*$this->product->harga + $ongkir;

        
        
        
        //Ngecek Apakah user punya data pesanan utama yg status nya 0
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Menyimpan / Update Data Pesanan Utama
        if(empty($pesanan))
        {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'total_berat' => $total_berat,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999),
            ]);

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            $pesanan->kode_pemesanan = 'NE-'.$pesanan->id;
            $pesanan->update();

        }else {
            $pesanan->total_harga = $pesanan->total_harga+$total_harga;
            $pesanan->total_berat = $pesanan->total_berat+$total_berat;
            $pesanan->update();
        }

        //Meyimpanan Pesanan Detail
        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'total_harga'=> $total_harga,
            'total_berat'=> $total_berat,
            'ongkir'=> $ongkir,
        ]);

        $this->emit('masukKeranjang');

        session()->flash('message', 'Sukses Masuk Keranjang');

        return redirect()->back();


    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
