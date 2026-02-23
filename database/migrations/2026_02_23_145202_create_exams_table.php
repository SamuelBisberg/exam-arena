<?php

use App\Models\Course;
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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('questionnaire_identifier');
            $table->string('session');
            $table->string('semester');
            $table->year('year');
            $table->date('exam_date')->index();

            $table->string('visibility_status');

            $table->integer('total_pages');
            $table->integer('total_questions');
            $table->integer('duration_minutes')->nullable();
            $table->text('instructions')->nullable();

            $table->timestamps();

            $table->foreignIdFor(Course::class)->constrained()->restrictOnDelete();

            $table->unique(['course_id', 'questionnaire_identifier'], 'questionnaire_identifier_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
