<?php

namespace ReesMcIvor\Diary\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiaryEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'file' => 'mimetypes:image/jpeg,image/png,video/avi,video/mpeg,video/quicktime,video/mp4,video/mov,application/octet-stream'
        ];
    }

}
