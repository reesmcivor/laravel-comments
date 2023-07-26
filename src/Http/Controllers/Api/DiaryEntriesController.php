<?php

namespace ReesMcIvor\Diary\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use ReesMcIvor\Diary\Http\Requests\CreateDiaryEntryRequest;
use ReesMcIvor\Diary\Http\Requests\UpdateDiaryEntryRequest;

class DiaryEntriesController extends Controller
{
    public function index()
    {
        return [];
    }

    public function store( CreateDiaryEntryRequest $request )
    {
        $file = $request->get('file');
        $filename = Str::slug($exercise['name']) . "." . $videoFile->getClientOriginalExtension();
        $filePath = $videoFile->move(
            storage_path("app/private/diary"),
            $filename
        );

        DiaryEntry::create([
            'user_id' => auth()->user()->id,
            'content' => $request->get('content'),
            'file' => $filePath
        ]);
    }

    public function update( UpdateDiaryEntryRequest $request )
    {
        DiaryEntry::update([
            'content' => $request->get('content'),
            'file' => $filePath
        ]);
    }


}
