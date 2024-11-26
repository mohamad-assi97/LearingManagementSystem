<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id(); 
            $table->morphs('evaluated'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('course_id')->nullable()->constrained('courses')->onDelete('cascade');
            $table->unsignedTinyInteger('rating'); 
            $table->text('comment')->nullable(); 
            $table->date('evaluate_date'); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};

