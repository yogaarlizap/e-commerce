<div class="container">

   {{-- BANNER --}}
   <div class="banner">
      <img src="{{ url('assets/slider/slider1.png') }}" alt="">
   </div>

   {{-- PILIH KATEGORI  --}}
   <section class="pilih-kategori mt-4">
      <h3><strong>Pilih Kategori</strong></h3>
      <div class="row mt-4">
         @foreach($categories as $category)
         <div class="col">
            <a href="{{ route('products.kategori', $category->id) }}">
               <div class="card shadow">
                  <div class="card-body text-center">
                     <img src="{{ url($category->image_path) }}" class="img-flui" height="80px" width="100px">
                     <h3 class="mt-3 text-dark">{{ $category->category_name }}</h3>
                  </div>
               </div>
            </a>
         </div>
         @endforeach
      </div>
   </section>

   {{-- BEST PRODUCT  --}}
   <section class="products mt-5 mb-5">
      <h3>
         <strong>Produk Terbaru</strong>
         <a href="{{ route('products') }}" class="btn btn-dark float-right"><i class="fas fa-eye"></i> Lihat Semua </a>
      </h3>
      <div class="row mt-4">
         @foreach($products as $i => $product)
            @if ($i == 4)
               @break
            @elseif (!$product)
               <div class="row mt-2">
                  <div class="col-md-12">
                     <h5><strong>No Data</strong> </h5>
                  </div>
               </div>
            @endif
            <div class="col-md-3">
               <div class="card">
                  <div class="card-body text-center">
                     <img src="{{ url($product->product_image->image_path) }}" class="img-fluid">
                     <div class="row mt-2">
                        <div class="col-md-12">
                           <h5><strong>{{ $product->product_name }}</strong> </h5>
                           <h5>Rp. {{ number_format($product->harga_jual) }}</h5>
                        </div>
                     </div>
                     <div class="row mt-2">
                        <div class="col-md-12">
                           <a href="{{ route('products.detail', $product->product_id) }}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </section>
</div>