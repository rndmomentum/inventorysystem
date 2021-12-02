<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_id');
            $table->string('name');
            $table->string('category_id');
            $table->string('location_id');
            $table->string('suppliers_id');
            $table->string('invoice_id');
            $table->string('image');
            $table->integer('total_stock');
            $table->integer('minimum_stock');
            $table->string('type_transaction');
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
        Schema::dropIfExists('transactions');
    }
}
