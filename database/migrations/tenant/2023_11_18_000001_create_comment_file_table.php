<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use ReesMcIvor\Comments\Models\Comment;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comment_file', function (Blueprint $table) {
            $table->id();
            $table->string('original_name');
            $table->string('file');
            $table->foreignIdFor(Comment::class);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comment_file');
    }
};

