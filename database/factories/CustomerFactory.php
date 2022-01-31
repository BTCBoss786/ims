<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition()
    {
        $states = State::all();
        return [
            'name' => $this->faker->company(),
            'gstin' => $this->faker->regexify('[A-Z0-9]{15}'),
            'address1' => $this->faker->address(),
            'address2' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state_id' => $states->random()->id
        ];
    }
}
