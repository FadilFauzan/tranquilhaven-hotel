<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
   * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 4),
            'title' => $this->faker->sentence(3),
            'slug' => $this->faker->slug(),
            'image' => $this->faker->imageUrl(640, 480, 'room', true),
            'description' => $this->faker->paragraph(4),
            'guest' => $this->faker->numberBetween(1, 10) . ' Guest',
            'size' => $this->faker->numberBetween(20, 100) . ' m²',
            'price' => $this->faker->numberBetween(100000, 1000000),
            'published_at' => $this->faker->optional()->dateTime(),
        ];
    }
}
