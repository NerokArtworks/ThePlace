<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikedProjectFactory extends Factory
{
    // protected $model = LikedProject::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id' => User::factory()->create()->id,
            'user_id' => User::all()->random()->id,
            'project_id' => Project::all()->random()->id,
        ];
    }
}
