<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('transactions', function(Blueprint $table){
                $table->increments('id');
                $table->integer('product_id')->unsigned()->default(0);
                $table->string('form_id');
                $table->integer('qty');
                $table->integer('total_price');
                $table->string('status');
                $table->foreign('product_id')
                            ->references('id')->on('products')
                            ->onUpdate;;
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
        //
         Schema::drop('transactions');
    }
}
