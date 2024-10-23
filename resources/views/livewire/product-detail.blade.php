<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produk Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-product">
                <div class="card-body">
                    <img src="{{ url('http://127.0.0.1:8000/assets/product') }}/{{ $product->gambar }}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <strong>{{ $product->nama }}</strong>
            </h2>
            <h4>
                Rp. {{ number_format($product->harga) }}
                @if($product->jumlah_stok > 0)
                <span class="badge badge-success"> <i class="fas fa-check"></i> Ready Stok</span>
                @else
                <span class="badge badge-danger"> <i class="fas fa-times"></i> Stok Habis</span>
                @endif
            </h4>

            <div class="row">
                <div class="col">
                    <form wire:submit.prevent="masukkanKeranjang">
                    <table class="table" style="border-top : hidden">
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>
                                <img src="{{ url('http://127.0.0.1:8000/assets/kategori') }}/{{ $product->kategori->gambar }}" class="img-fluid"
                                    width="50">
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Tersedia</td>
                            <td>:</td>
                            <td>{{ $product->jumlah_stok }}</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>{{ $product->keterangan }}</td>
                        </tr>
                        <tr>
                            <td>Berat</td>
                            <td>:</td>
                            <td>{{ $product->berat }}Kg</td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>:</td>
                            <td>
                                <input id="jumlah_pesanan" type="number"
                                    class="form-control @error('jumlah_pesanan') is-invalid @enderror"
                                    wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required
                                    autocomplete="name" autofocus>

                                @error('jumlah_pesanan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Kota Tujuan</td>
                            <td>:</td>
                            <td>
                                <input id="tujuan" type="text"
                                    class="form-control @error('tujuan') is-invalid @enderror"
                                    wire:model="tujuan" value="{{ old('tujuan') }}" required
                                    autocomplete="name" autofocus>

                                @error('tujuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        @if($product->jumlah_stok <= 0)
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-dark btn-block"  disabled ><i class="fas fa-shopping-cart"></i>  Masukkan Keranjang</button>
                            </td>
                        </tr>
                        @elseif($product->jumlah_stok >= $jumlah_pesanan and $jumlah_pesanan <= 0)
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-dark btn-block"  disabled ><i class="fas fa-shopping-cart"></i>  Masukkan Keranjang</button>
                            </td>
                        </tr>
                        @elseif($product->jumlah_stok < $jumlah_pesanan and $jumlah_pesanan > 0)
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-dark btn-block"  disabled ><i class="fas fa-shopping-cart"></i>  Masukkan Keranjang</button>
                            </td>
                        </tr>
                        @elseif($product->jumlah_stok >= $jumlah_pesanan and $jumlah_pesanan > 0)
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-dark btn-block" ><i class="fas fa-shopping-cart"></i>  Masukkan Keranjang</button>
                            </td>
                        </tr>
                        @endif
                    </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>