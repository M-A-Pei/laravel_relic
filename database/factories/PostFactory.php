<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(5);
        $slug = strtolower(preg_replace('/\s+/', '-', $title));
        $body = $this->faker->sentence(100);
        $snip = substr($body,0,120);

        return [
                'title' => $title,
                'category_id' => $this->faker->numberBetween(1, 5),
                'user_id' => 1,
                'slug' => $slug,
                'snip' => $snip,
                'body' => $body,
        ];
    }
}
