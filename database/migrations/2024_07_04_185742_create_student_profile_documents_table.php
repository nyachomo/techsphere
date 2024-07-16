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
        Schema::create('student_profile_documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_name')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document_file')->nullable();
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
        Schema::dropIfExists('student_profile_documents');
    }
};
