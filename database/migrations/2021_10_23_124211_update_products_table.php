<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->double('price')->unsigned();
            $table->double('quantity')->unsigned();
            $table->bigInteger('producer_id')->unsigned();
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('discount_id')->unsigned();
            $table->foreign('producer_id')->references('id')->on('producers')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_producer_id_foreign');
            $table->dropForeign('products_unit_id_foreign');
            $table->dropForeign('products_discount_id_foreign');
            $table->dropColumn('price');
            $table->dropColumn('quantity');
            $table->dropColumn('producer_id');
            $table->dropColumn('unit_id');
            $table->dropColumn('discount_id');
        });
    }
}
