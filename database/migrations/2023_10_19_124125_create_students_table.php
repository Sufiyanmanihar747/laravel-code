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
            $table->string('name')->nullable();
            $table->id();
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('course')->nullable();
            $table->string('year')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }
    // php artisan make:migration add_your_column_name_to_your_table_name --table=your_table_name
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
