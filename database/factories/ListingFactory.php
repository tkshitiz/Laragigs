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
            'title'=>$this->faker->name(),
            'tags'=>'laravel,api',
            'company'=> $this->faker->company(),
            'email'=>$this->faker->email(),
            'website'=>$this->faker->url(),
            'location'=>$this->faker->city(),
            'description'=>$this->faker->paragraph(5)

        ];
    }
}
