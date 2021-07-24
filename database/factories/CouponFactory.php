<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => 'off20',
            'type' => 'fixed',
            'value' => $this->faker->numberBetween(100, 600),
            'cart_value' => $this->faker->numberBetween(100, 600),
            'expired_date' => Carbon::now()->addWeek(2),
        ];
    }
}
