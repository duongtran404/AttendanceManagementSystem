<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('begin_date');
            $table->date('end_date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('class_subject_id');
            $table->softDeletes();
            $table->timestamps();
            });
        // Schema::table('classes', function(Blueprint $table){        
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->foreign('class_subject_id')->references('id')->on('class_subjects');            
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
