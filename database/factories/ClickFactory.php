<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Click>
 */
class ClickFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => UserFactory::new()->create()->id,
            'link_id' => LinkFactory::new()->create()->id,
            'ip' => $this->faker->ipv4,
            'user_agent' => $this->faker->userAgent,
        ];
    }
}
