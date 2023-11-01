<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('status');
            $table->string('notes')->nullable();
            $table->unsignedBigInteger('lesson_id');
            $table->timestamps();
        });
        // Schema::table('attendances',function(Blueprint $table){
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->foreign('lesson_id')->references('id')->on('lessons');    
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
