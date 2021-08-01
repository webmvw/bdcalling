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
            $table->string('responsible');
            $table->string('inc_data');
            $table->string('account');
            $table->integer('amount');
            $table->integer('percentage');
            $table->integer('charges_platform');
            $table->string('client_user_id');
            $table->string('client_name');
            $table->string('email_address');
            $table->string('client_linkedIn');
            $table->string('order_page_url');
            $table->string('spreadsheet_link');
            $table->string('remarks')->nullable();
            $table->integer('deli_amount');
            $table->string('Deli_DeedLine');
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
