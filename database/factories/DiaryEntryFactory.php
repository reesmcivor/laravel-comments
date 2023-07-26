<?php

namespace ReesMcIvor\Diary\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ReesMcIvor\Diary\Models\DiaryEntry;

class DiaryEntryFactory extends Factory
{
    protected $model = Diary::class;

    public function definition()
    {
        return [
            'answer' => $this->faker->boolean(),
        ];
    }
}
