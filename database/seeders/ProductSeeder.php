<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->truncate();
        $cadenas = Category::where('slug', 'cadenas')->first();
        $anillos = Category::where('slug', 'anillos')->first();

        $products = [
            [
                'name' => 'Cadena de Gengar',
                'category_id' => $cadenas->id,
            ],
            [
                'name' => 'Cadena Murakami',
                'category_id' => $cadenas->id,
            ],
            [
                'name' => 'Cadena de la Virgen del Rocio',
                'category_id' => $cadenas->id,
            ],
            [
                'name' => 'Anillo de Perro',
                'category_id' => $anillos->id,
            ],
            [
                'name' => 'Anillo de Lobo',
                'category_id' => $anillos->id,
            ],
            [
                'name' => 'Anillo de Oro Blanco',
                'category_id' => $anillos->id,
            ],
        ];

        foreach ($products as $prod) {
            $product = new Product();
            $product->name = $prod['name'];
            $product->slug = Str::slug($prod['name']);
            $product->short_description = 'Breve descripción de ' . $prod['name'];
            $product->description = 'Descripción larga de ' . $prod['name'];
            $product->regular_price = rand(50, 300);
            $product->sale_price = rand(30, 200);
            $product->SKU = 'SKU-' . strtoupper(Str::random(5));
            $product->stock_status = 'instock';
            $product->featured = false;
            $product->quantity = rand(5, 20);
            $product->category_id = $prod['category_id'];
            $product->save();
        
            // Ahora que ya tiene ID, podemos asignar la imagen
            $product->image = 'assets/imgs/products/product-' . $product->id . '.jpg';
            $product->save();
        }
        
    }
}
