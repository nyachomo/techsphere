<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_education_achivements', function (Blueprint $table) {
            $table->id();
            $table->text('student_education_achivement')->nullable();
            $table->unsignedBigInteger('education_id'); // Foreign key
            $table->foreign('education_id')->references('id')->on('education_experiences')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_education_achivements');
    }
};
