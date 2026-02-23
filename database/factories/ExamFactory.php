<?php

namespace Database\Factories;

use App\Enums\SemesterEnum;
use App\Enums\SessionEnum;
use App\Enums\VisibilityStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'questionnaire_identifier' => $this->faker->unique()->bothify('??-####'),
            'session' => $this->faker->randomElement(SessionEnum::cases()),
            'semester' => $this->faker->randomElement(SemesterEnum::cases()),
            'year' => $this->faker->year(),
            'exam_date' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'visibility_status' => $this->faker->randomElement(VisibilityStatusEnum::cases()),
            'total_pages' => $this->faker->numberBetween(1, 20),
            'total_questions' => $this->faker->numberBetween(10, 100),
            'duration_minutes' => $this->faker->optional()->numberBetween(30, 180),
            'instructions' => $this->faker->optional()->paragraph(),
        ];
    }
}
