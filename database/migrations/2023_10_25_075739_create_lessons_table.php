<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->dateTime('begin_time');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('class_member_id');
            $table->softDeletes();
            $table->timestamps();

        });
        // Schema::table('lesson',function(Blueprint $table){
            
        //     $table->foreign('location_id')->references('id')->on('locations');
        //     $table->foreign('class_member_id')->references('id')->on('class_members');         
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
