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
            $table->integer('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('religion')->nullable();
            $table->string('id_no')->nullable();
            $table->date('dob')->nullable();
            $table->integer('code')->nullable();
            $table->date('join_date')->nullable();
            $table->unsignedBigInteger("department_id")->unsigned()->nullable();
            $table->unsignedBigInteger("designation_id")->unsigned()->nullable();
            $table->unsignedBigInteger("grade_id")->unsigned()->nullable();
            $table->double('salary')->nullable();
            $table->unsignedBigInteger('role_id')->comment('1:Super Admin|2:Admin|3:User|4:KAM Sales|5:KAM Operation');
            $table->integer('status')->default('1')->comment('1:active|0:inactive');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
