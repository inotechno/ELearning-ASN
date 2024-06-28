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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('institution_id')->nullable()->constrained('institution_masters')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('education_id')->nullable()->constrained('education_masters')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('rank_id')->nullable()->constrained('rank_masters')->nullOnDelete()->cascadeOnUpdate();
            $table->string('front_name');
            $table->string('back_name')->nullable();
            $table->string('front_title')->nullable();
            $table->string('back_title')->nullable();
            $table->string('nik', 16)->nullable();
            $table->string('nip')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('unit_name')->nullable();
            $table->string('position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
