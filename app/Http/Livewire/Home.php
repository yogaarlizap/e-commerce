<?php

namespace App\Http\Livewire;

use App\Product;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $categories = Http::get("http://127.0.0.1:8000/api/v1/product-categories");
        $products =  Http::get("http://127.0.0.1:8000/api/v1/products");
        return view('livewire.home', [
            'products' => json_decode($products),
            'categories' => json_decode($categories)
        ]);
    }
}
