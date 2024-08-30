<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Domain\Filter\Models\Filter;
use App\Domain\Filter\Models\ProductFilter;
use App\Domain\Filter\Models\ProductFilterValue;
use App\Domain\Product\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);

        for ($i = 0; $i < 30; $i++) {
            Product::create([
                'title' => fake()->word(),
                'count' => fake()->numberBetween(1, 100),
                'price' => fake()->randomFloat()
            ]);
        }


        Filter::insert([
            'title' => 'color',
        ]);

        Filter::insert([
            'title' => 'brand',
        ]);

        Filter::insert([
            'title' => 'country',
        ]);

        for ($i = 0; $i < 3; $i++) {
            ProductFilter::insert([
                'title' => fake()->colorName,
                'filter_id' => 1,
            ]);
        }

        for ($i = 0; $i < 3; $i++) {
            ProductFilter::insert([
                'title' => fake()->sentence(),
                'filter_id' => 2,
            ]);
        }

        for ($i = 0; $i < 3; $i++) {
            ProductFilter::insert([
                'title' => fake()->country(),
                'filter_id' => 3,
            ]);
        }

        ProductFilterValue::insert([
            'product_id' => 1,
            'product_filter_id' => 1,
        ]);

        ProductFilterValue::insert([
            'product_id' => 1,
            'product_filter_id' => 4,
        ]);

        ProductFilterValue::insert([
            'product_id' => 1,
            'product_filter_id' => 7,
        ]);

        ProductFilterValue::insert([
            'product_id' => 2,
            'product_filter_id' => 2,
        ]);

        ProductFilterValue::insert([
            'product_id' => 2,
            'product_filter_id' => 5,
        ]);

        ProductFilterValue::insert([
            'product_id' => 2,
            'product_filter_id' => 8,
        ]);

        ProductFilterValue::insert([
            'product_id' => 3,
            'product_filter_id' => 3,
        ]);

        ProductFilterValue::insert([
            'product_id' => 3,
            'product_filter_id' => 6,
        ]);

        ProductFilterValue::insert([
            'product_id' => 3,
            'product_filter_id' => 9,
        ]);
    }
}
