<?php

namespace Database\Factories;

use App\Enums\TopicStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->optional()->paragraph(),
            'order_column' => $this->faker->numberBetween(1, 100),
            'topic_status' => $this->faker->randomElement(TopicStatusEnum::cases()),
        ];
    }
}
