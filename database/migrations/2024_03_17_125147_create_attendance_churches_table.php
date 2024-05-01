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
        Schema::create('attendance_churches', function (Blueprint $table) {
            $table->id();
            $table->text('activity')->nullable();
            $table->string('male')->nullable();
            $table->string('female')->nullable();
            $table->string('children')->nullable();
            $table->string('the_date')->nullable();
            $table->string('branch_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_churches');
    }
};
