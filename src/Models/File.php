<?php

namespace ReesMcIvor\Comments\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ReesMcIvor\Comments\Database\Factories\FileFactory;

class File extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        return FileFactory::new();
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
