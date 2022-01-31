<?php

namespace Database\Factories;

use App\Models\Tax;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $units = Unit::all();
        $taxes = Tax::all()->except([1, 2, 3, 4]);
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'hsn' => $this->faker->randomNumber(4, true),
            'rate' => $this->faker->numberBetween(100, 500),
            'unit_id' => $units->random()->id,
            'category_id' => 1,
            'tax_id' => $taxes->random()->id
        ];
    }
}
