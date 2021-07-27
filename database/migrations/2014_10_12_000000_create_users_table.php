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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer("department_id")->unsigned()->nullable();
            $table->integer("designation_id")->unsigned()->nullable();
            $table->integer('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('religion')->nullable();
            $table->string('id_no')->nullable();
            $table->integer('code')->nullable();
            $table->integer('role_id')->default('2')->comment('1:admin|2:user');
            $table->integer('status')->default('1')->comment('1:active|0:inactive');
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
