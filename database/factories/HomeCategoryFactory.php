<?php

namespace Database\Factories;

use App\Models\HomeCategory;
use Illuminate\Database\Eloquent\Factories\Factory;


class HomeCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HomeCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sel_categories' => $this->faker->text(18),
            'no_of_products' => rand(1, 5)
        ];
    }
}
