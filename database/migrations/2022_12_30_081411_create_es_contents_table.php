<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('es_contents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('es_id');
            $table->foreign('es_id')->references('id')->on('external_stocks')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->char('product_name');
            $table->char('product_code');
            $table->integer('quantity');
            $table->decimal('sale_price', $precision = 8, $scale = 2);
            $table->decimal('purchasing_price', $precision = 8, $scale = 2);
            $table->date('expiry_date');
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
        Schema::dropIfExists('es_contents');
    }
}
