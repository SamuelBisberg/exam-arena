<?php

namespace Database\Factories;

use App\Enums\CourseActivityStatusEnum;
use App\Enums\CourseLevelEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->optional()->paragraph(),
            'course_code' => strtoupper($this->faker->bothify('???###')),
            'level' => $this->faker->randomElement(CourseLevelEnum::cases()),
            'activity_status' => CourseActivityStatusEnum::ACTIVE,
        ];
    }
}
