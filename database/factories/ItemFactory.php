<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return [
        //     'fk_i_category_id' => $this->faker->numberBetween(1,9),
        //     'dt_pub_date' => $this->faker->date('Y-m-d'),
        //     's_contact_email' => $this->faker->email(),
        //     'description' => $this->faker->sentence(6),
        // ];
    }
}
