<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('keranjang') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <h4>Informasi Pembayaran</h4>
            <hr>
            <p>Untuk pembayaran silahkan transfer ke rekening dibawah ini sebesar : <br><strong> Rp. {{ number_format($total_harga) }}</strong> </p>
            <div class="media">
                <img class="mr-3" src="{{ url('assets/bca.png') }}" alt="Bank BCA" width="60">
                <div class="media-body">
                    <h5 class="mt-0">BANK BCA</h5>
                    No. Rekening 7130761849 atas nama <strong>Dian Sudaryati</strong><br>
                    No. WhatsApp <strong>081322314294</strong>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Informasi Pengiriman</h4>
            <hr>
            <form action="{{ route("apiCheckout") }}" method="POST">
                @csrf
                @method("post")

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <label for="">No. HP</label>
                    <input id="nohp" type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror" wire:model="nohp"
                    value="{{ old('nohp') }}" autocomplete="name" autofocus>

                    @error('nohp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea wire:model="alamat" name="alamat" class="form-control @error('nama') is-invalid @enderror"></textarea>

                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i> Checkout </button>
            </form>
        </div>
    </div>
</div>