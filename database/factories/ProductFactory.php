<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb = 6, $asText = true);
        $slug = str::slug($product_name, '-');
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(1000, 10000),
            'sale_price' => $this->faker->numberBetween(500, 5000),
            'SKU' => 'PRD' . $this->faker->unique()->numberBetween(100 , 500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(10, 100),
            'image' => 'product-'.$this->faker->numberBetween(1, 16),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
