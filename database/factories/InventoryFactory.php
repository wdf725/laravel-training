<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    protected $model = \App\Models\Inventory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this-> faker->word(),
            'qty' => $this-> faker->numberBetween(1, 100),
            'price' => $this-> faker->randomFloat(2, 10, 1000),
            'description' => $this-> faker->sentence(),
            'user_id' => \App\Models\User::factory(), // Menambah user_id secara automatik
        ];
    }
}
