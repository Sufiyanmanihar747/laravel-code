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
        Schema::table('teacher_student', function (Blueprint $table) {
            $table->uuid('id')->change();
            $table->uuid('teacher_id')->change();
            $table->uuid('student_id')->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teacher_student', function (Blueprint $table) {
            
            $table->id()->change();
            $table->bigInteger('teacher_id')->change();
            $table->bigInteger('student_id')->change();
        });
    }
};
