<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class, 'kategori_id', 'id');
    }
}
