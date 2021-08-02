<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kam_id')->unsigned()->nullable()->comment("kam_id=user_id");
            $table->string('inc_data')->nullable();
            $table->bigInteger('account')->unsigned()->nullable()->comment("account=account_id");
            $table->integer('amount')->nullable();
            $table->integer('percentage')->nullable();
            $table->integer('charges_platform')->nullable();
            $table->string('client_user_id')->nullable();
            $table->string('client_name')->nullable();
            $table->string('email_address')->nullable();
            $table->string('client_linkedIn')->nullable();
            $table->string('order_page_url')->nullable();
            $table->string('spreadsheet_link')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('deli_amount')->nullable();
            $table->string('Deli_DeedLine')->nullable();
            $table->timestamps();
            $table->foreign('kam_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('account')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
