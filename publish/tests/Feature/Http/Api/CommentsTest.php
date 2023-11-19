<?php

namespace ReesMcIvor\Comments\Tests\Feature\Http\Api;

use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use ReesMcIvor\Labels\Models\Label;

class CommentsTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_commend_can_be_created()
    {
        $this->actAsCustomer();

        // Create mock files for upload
        $file1 = UploadedFile::fake()->image('file1.jpg');
        $file2 = UploadedFile::fake()->image('file2.jpg');
        $file3 = UploadedFile::fake()->image('file3.jpg');

        $files = [$file1, $file2, $file3];

        $this
            ->postJson('/api/comments', [
                'content' => 'This is a comment',
                'files' => $files,
            ])
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    'files' => [
                        'data' => [
                            '*' => [
                                'id',
                                'file',
                                'original_name'
                            ]
                        ]
                    ],
                    'content'
                ]
            ]);
    }
}