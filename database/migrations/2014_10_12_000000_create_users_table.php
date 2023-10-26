<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin','student','teacher']);
            $table->integer('phone_number');
            $table->string('location');
            $table->enum('gerden', ['male','female','another']);
            $table->enum('status', ['currently enrolled','dropped out','leave of absence'])->nullable();
            $table->enum('title', ['lecturer','associate professor','professor'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('department')->nullable();
            $table->string('notes')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
