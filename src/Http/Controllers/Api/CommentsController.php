<?php

namespace ReesMcIvor\Comments\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use ReesMcIvor\Comments\Http\Resources\CommentResource;
use ReesMcIvor\Comments\Models\Comment;
use ReesMcIvor\Comments\Http\Requests\CreateCommentRequest;

class CommentsController extends Controller
{
    public function index()
    {
        return [];
    }

    public function store( CreateCommentRequest $request )
    {
        $files = $request->allFiles();

        $comment = Comment::create([
            'user_id' => auth()->user()->id,
            'comment_id' => $request->get('comment_id'),
            'content' => $request->get('content')
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file)
            {
                $file = $file->store('files', 'comments');
                $comment->files()->create([
                    'file' => $file,
                    'original_name' => $file,
                ]);
            }
        }

        return new CommentResource($comment);
    }


}
