<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
        	'nama' => 'Rak Tempel',
        	'gambar' => 'tempel.png',
        ]);

        DB::table('kategoris')->insert([
        	'nama' => 'Rak Gantung',
        	'gambar' => 'gantung.png',
        ]);
    }
}
