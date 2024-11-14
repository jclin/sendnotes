<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'body' => $this->faker->sentences(1, true),
            'recipient' => $this->faker->email(),
            'is_published' => true,
            'heart_count' => 0,
            'send_date' => now()->addDays($this->faker->numberBetween(1, 30)),
        ];
    }
}
