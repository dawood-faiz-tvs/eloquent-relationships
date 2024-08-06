<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $watchable = $this->watchable();

        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'url' => fake()->url(),
            'watchable_type' => $watchable,
            'watchable_id' => $watchable::factory()->create()
        ];
    }

    public function watchable()
    {
        return fake()->randomElement([\App\Models\Series::class, \App\Models\Podcast::class]);
    }
}
