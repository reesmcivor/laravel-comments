<?php

namespace ReesMcIvor\Comments\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{
    public function authorize() : bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'commentable_id' => 'sometimes',
            'commentable_type' => 'sometimes',
            'content' => 'required|string',
            'comment_id' => 'nullable|exists:comments,id',
            'files.*' => 'mimetypes:image/jpeg,image/png,video/avi,video/mpeg,video/quicktime,video/mp4,video/mov,application/octet-stream'
        ];
    }

}
