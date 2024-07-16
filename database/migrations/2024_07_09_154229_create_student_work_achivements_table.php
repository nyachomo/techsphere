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
        Schema::create('student_work_achivements', function (Blueprint $table) {
            $table->id();
            $table->text('student_work_achivement')->nullable();
            $table->unsignedBigInteger('work_id'); // Foreign key
            $table->foreign('work_id')->references('id')->on('work_experiences')->onDelete('cascade');
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
        Schema::dropIfExists('student_work_achivements');
    }
};
