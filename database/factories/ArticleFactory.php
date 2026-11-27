<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $designation = fake()->unique()->words(3, true);

        return [
            'designation' => $designation,
            'slug' => str()->slug($designation),
            'reference' => fake()->unique()->regexify('[A-Z]{3}-[0-9]{4}-[A-Z]{3}'),
            'description' => fake()->realText(200),
            'prix' => fake()->randomFloat(3, 5, 9000),
            'stock' => fake()->numberBetween(0, 50),
            'actif' => fake()->boolean(85),
        ];
    }

    public function epuise(): static
    {
        return $this->state(fn (array $attributes): array => [
            'stock' => 0,
        ]);
    }

    public function inactif(): static
    {
        return $this->state(fn (array $attributes): array => [
            'actif' => false,
        ]);
    }
}
