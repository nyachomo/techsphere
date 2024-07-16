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
        Schema::create('referees', function (Blueprint $table) {
            $table->id();
           
            $table->string('referee_name')->nullable();
            $table->string('referee_phone')->nullable();
            $table->string('referee_email')->nullable();
            $table->string('referee_organisation')->nullable();
            $table->string('referee_position')->nullable();
            $table->string('years_knowing_referee')->nullable();
            $table->unsignedBigInteger('student_id'); // Foreign key
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('referees');
    }
};
