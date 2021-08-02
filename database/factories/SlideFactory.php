<?php

namespace Database\Factories;

use App\Models\HomeSlide;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class SlideFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HomeSlide::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::random(10),
            'subtitle' => Str::random(10),
            'price' => random_int(10, 100),
            'link' => '/',
            'image' => "1626628200.jpg",
            'status' => '1'
        ];
    }
}
