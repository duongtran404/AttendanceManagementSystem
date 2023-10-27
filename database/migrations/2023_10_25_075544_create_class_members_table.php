<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('class_subject_id');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
        // Schema::table('class_members',function(Blueprint $table){
            
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->foreign('class_id')->references('id')->on('classes');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_members');
    }
}
