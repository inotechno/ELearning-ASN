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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('category_courses')->cascadeOnDelete()->cascadeOnUpdate()->comment('Ambil dari category_course');
            $table->foreignId('type_id')->constrained('type_courses')->cascadeOnDelete()->cascadeOnUpdate()->comment('Ambil dari type_course');
            $table->foreignId('teacher_id')->constrained('teachers')->cascadeOnDelete()->cascadeOnUpdate()->comment('Ambil dari table teacher');
            $table->string('img_thumbnail');
            $table->string('img_thumbnail_path')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('description_short');
            $table->text('description');
            $table->date('implementation_start');
            $table->date('implementation_end');
            $table->boolean('is_active')->default(1);
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
