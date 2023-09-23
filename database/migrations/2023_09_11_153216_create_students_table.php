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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('student_number', 50)->nullable();
            $table->string('first_name', 100);
            $table->string('middle_name', 100)->nullable();
            $table->string('last_name', 100);
            $table->string('suffix', 10)->nullable();
            $table->string('sex', 10);
            $table->string('contact_number', 20);
            $table->date('birth_date');
            $table->string('birth_place', 250);
            $table->string('address', 250);
            $table->string('degree', 100);
            $table->string('major', 100);
            $table->integer('year_level');
            $table->date('date_enrolled');
            $table->boolean('is_graduated')->default(false);
            $table->date('date_graduated')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->unsignedBigInteger('approved_by')->nullable()->comment('ID the one who approved the student, might the ID of the employee');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
