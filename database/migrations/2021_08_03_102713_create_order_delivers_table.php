<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDeliversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_delivers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('responsible')->unsigned()->nullable()->comment('responsible=user_id');
            $table->date('inc_date')->nullable();
            $table->bigInteger('account_id')->unsigned()->nullable();
            $table->double('amount')->nullable();
            $table->double('percentage')->nullable();
            $table->double('platform_charges')->nullable();
            $table->string('client_user_id')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_linkedin')->nullable();
            $table->string('orderpage_url')->nullable();
            $table->string('spreadsheet_link')->nullable();
            $table->string('remarks')->nullable();
            $table->bigInteger('team_id')->unsigned()->nullable();
            $table->double('tips')->nullable();
            $table->enum('order_status', ['NRA', 'WIP', 'NE', 'Complete', 'Delivered', 'Revision', 'Issues', 'Cancalled'])->nullable();
            $table->bigInteger('delivered_by')->unsigned()->nullable();
            $table->bigInteger('franchise_id')->unsigned()->nullable();
            $table->date('deli_date')->nullable();
            $table->double('deli_amount')->nullable();
            $table->dateTime('deli_last_time')->nullable();
            $table->string('coundown_timer')->nullable();
            $table->timestamps();
            $table->foreign('responsible')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('delivered_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('franchise_id')->references('id')->on('franchises')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_delivers');
    }
}
