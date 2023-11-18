<?php

namespace ReesMcIvor\Comments\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use ReesMcIvor\Comments\Http\Resources\CommentResource;
use ReesMcIvor\Comments\Models\Comment;
use ReesMcIvor\Comments\Models\File;
use ReesMcIvor\Comments\Http\Requests\CreateCommentRequest;

class CommentsController extends Controller
{
    public function index()
    {
        return [];
    }

    public function store( CreateCommentRequest $request )
    {
        $file = $request->get('file');
        $comment = Comment::create([
            'user_id' => auth()->user()->id,
            'comment_id' => $request->get('comment_id'),
            'content' => $request->get('content')
        ]);

        if($file) {
            $filePath = $file->storeAs('comments', Str::random(40) . '.' . $file->extension(), 'comments');
            File::create([
                'file' => $filePath,
                'comment_id' => $comment->id
            ]);
        }

        return new CommentResource($comment);
    }


}
