<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_topics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type_topic_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->string('video_url')->nullable();
            $table->string('document_url')->nullable();
            $table->string('document_path')->nullable();
            $table->string('zoom_url')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->decimal('percentage_value', 5, 2)->nullable();
            $table->enum('status', ['begin', 'progress', 'finish'])->default('begin');

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_topics');
    }
};
