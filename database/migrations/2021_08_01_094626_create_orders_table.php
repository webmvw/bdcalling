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
            $table->string('kam_id')->nullable();
            $table->string('inc_data')->nullable();
            $table->string('account')->nullable();
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
