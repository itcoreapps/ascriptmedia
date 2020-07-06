<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('p_name');
            $table->float('p_price_egp' , 8 ,2);
            $table->float('p_price_dollar' , 8 ,2);
            $table->float('p_price_bitcoins' , 8 , 8);
            $table->string('p_video');
            $table->integer('num_of_sales');
            $table->string('p_description');
            $table->integer('cat_id');
            // $table->foreign('cat_id')->references('cat_id')->on('products');

        
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
        Schema::dropIfExists('products');
    }
}
