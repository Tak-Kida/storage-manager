<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_id' => $this->faker->numberBetween($min = 1, $max = 999),
            'order_total_price' => $this->faker->numberBetween($min = 1, $max = 99999),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 999),
            'order_status' => $this->faker->numberBetween($min = 1, $max = 4),
        ];
    }
}
