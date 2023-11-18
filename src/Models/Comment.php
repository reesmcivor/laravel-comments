<?php

namespace ReesMcIvor\Comments\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ReesMcIvor\Comments\Database\Factories\CommentFactory;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['content' => 'encypted'];

    protected static function newFactory()
    {
        return CommentFactory::new();
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        $this->hasMany(Comment::class, 'parent_id');
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
