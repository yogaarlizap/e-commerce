<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'nama' => 'Rak Ambalan Tingkat Natural',
            'harga' => 130000,
            'kategori_id' => 2,
            'jumlah_stok' => 99,
            'gambar' => 'tingkatnatural.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Rak Ambalan Gantung Natural',
            'harga' => 125000,
            'kategori_id' => 2,
            'jumlah_stok' => 25,
            'gambar' => 'gantungnatural.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Rak Kotak Natural 1 Set + Pot',
            'harga' => 150000,
            'kategori_id' => 1,
            'jumlah_stok' => 70,
            'gambar' => 'kotaknatural.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Rak Kotak Hitam 1 Set + Pot',
            'harga' => 150000,
            'kategori_id' => 1,
            'jumlah_stok' => 100,
            'gambar' => 'kotakhitam.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Rak Datar Natural 1 Set ',
            'harga' => 135000,
            'kategori_id' => 1,
            'jumlah_stok' => 90,
            'gambar' => 'datarnatural.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Rak Datar Putih 1 Set',
            'harga' => 135000,
            'kategori_id' => 1,
            'jumlah_stok' => 70,
            'gambar' => 'datarputih.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Rak Datar Hitam 1 Set',
            'harga' => 135000,
            'kategori_id' => 1,
            'jumlah_stok' => 78,
            'gambar' => 'datarhitam.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Rak Hexagonal Natural 1 Set',
            'harga' => 160000,
            'kategori_id' => 1,
            'jumlah_stok' => 66,
            'gambar' => 'hexagonalnatural.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Rak Hexagonal Hitam 1 Set',
            'harga' => 160000,
            'kategori_id' => 1,
            'jumlah_stok' => 82,
            'gambar' => 'hexagonalhitam.png'
        ]);

        DB::table('products')->insert([
        	'nama' => 'Rak Hexagonal Putih 1 Set',
            'harga' => 160000,
            'kategori_id' => 1,
            'jumlah_stok' => 73,
            'gambar' => 'hexagonalputih.png'
        ]);
    }
}
