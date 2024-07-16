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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('vacancy_no')->nullable();
            $table->text('vacancy_name')->nullable();
            $table->text('vacancy_description')->nullable();
            $table->text('vacancy_responsibility')->nullable();
            $table->text('vacancy_qualification')->nullable();
            $table->string('no_of_position')->nullable();
            $table->string('opening_date')->nullable();
            $table->string('closing_date')->nullable();
            $table->string('vacancy_status')->nullable();
            $table->string('total_applicants')->nullable();
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
        Schema::dropIfExists('jobs');
    }
};
