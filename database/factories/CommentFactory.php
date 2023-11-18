<?php

namespace ReesMcIvor\Comments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ReesMcIvor\Comments\Models\Comment;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'content' => $this->faker->text('150'),
            'comment_id' => null,
        ];
    }
}
