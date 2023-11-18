<?php

namespace ReesMcIvor\Comments\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'comment_id' => 'nullable|exists:comments,id',
            'file' => 'mimetypes:image/jpeg,image/png,video/avi,video/mpeg,video/quicktime,video/mp4,video/mov,application/octet-stream'
        ];
    }

}