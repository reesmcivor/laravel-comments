<?php

namespace ReesMcIvor\Comments\Models;

use App\Models\User;
use App\Notifications\Comment\NewCommentNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use ReesMcIvor\Comments\Database\Factories\CommentFactory;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['content' => 'encrypted'];

    protected static function boot()
    {
        parent::boot();

        static::created(function($model) {
            User::whereIn('email', [
                'oli@optimal-movement.co.uk',
                'hello@logicrises.co.uk'
            ])->get()->each(function($user) use ($model) {
                echo $user->email;
                $user->notify(new NewCommentNotification($model));
            });
        });
    }

    protected static function newFactory()
    {
        return CommentFactory::new();
    }

    public function files(): HasMany
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
