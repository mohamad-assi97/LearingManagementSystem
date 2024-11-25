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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id('evaluation_id'); 
        $table->unsignedBigInteger('evaluated_id'); 
        $table->string('evaluated_type'); 
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
        $table->foreignId('course_id')->nullable()->constrained('courses')->onDelete('cascade'); // الدورة المقيمة
        $table->unsignedTinyInteger('rating'); 
        $table->text('comment')->nullable(); 
        $table->date('evaluate_date'); 
        $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};

