<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => rand(1,5),
            "title" => $this->faker->sentence(),
            "tags" => "laravel, api, backend",
            "company" => $this->faker->company,
            "location" => $this->faker->city,
            "email" => $this->faker->companyEmail,
            'website' =>  $this->faker->url,
            "description" => $this->faker->paragraph(5)
        ];
    }
}
