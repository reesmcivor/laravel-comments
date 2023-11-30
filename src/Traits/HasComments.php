<?php

namespace ReesMcIvor\Comments\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use ReesMcIvor\Comments\Models\Comment;
use ReesMcIvor\SlotKeeper\Models\SlotKeeper;

trait HasComments
{
    public function comments() : MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
