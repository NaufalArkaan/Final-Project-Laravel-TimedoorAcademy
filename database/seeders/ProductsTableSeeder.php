<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('products')->insert([
            'name' => 'Produk A',
            'price' => 100,
            'stock' => 50,
            'image' => '', // added image column
            'created_at' => $now,
            'updated_at' => $now,
            ]);
        DB::table('products')->insert([
            'name' => 'Produk B',
            'price' => 150,
            'stock' => 30,
            'image' => '',// added image column
            'created_at' => $now,
            'updated_at' => $now,
            ]);
        DB::table('products')->insert([
            'name' => 'Produk C',
            'price' => 200,
            'stock' => 50,
            'image' => '', // added image column
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}