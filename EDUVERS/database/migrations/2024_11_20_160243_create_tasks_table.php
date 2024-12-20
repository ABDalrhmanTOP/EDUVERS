<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id')->constrained()->onDelete('cascade'); // Link to playlists table
            $table->string('title');
            $table->text('prompt');
            $table->string('expected_output')->nullable();
            $table->string('syntax_hint')->nullable();
            $table->string('timestamp'); // Timestamp of when the task should appear in the video
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
