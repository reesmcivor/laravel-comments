<?php

namespace ReesMcIvor\Diary\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ReesMcIvor\Diary\Database\Factories\DiaryEntryFactory;

class DiaryEntry extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['content' => 'encypted'];

    protected static function newFactory()
    {
        return DiaryEntryFactory::new();
    }
}
