<?php

namespace ReesMcIvor\Comments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ReesMcIvor\Comments\Models\Comment;

class FileFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'file' => $this->faker->file('public/storage', 'public/storage'),
            'comment_id' => Comment::factory()->create()->id,
        ];
    }
}
