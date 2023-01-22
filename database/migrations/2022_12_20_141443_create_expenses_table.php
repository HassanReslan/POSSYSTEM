<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('expenses_type_id');
             $table->foreign('expenses_type_id')->references('id')->on('expenses_types')->onDelete('cascade');
             $table->char('expense_name');
             $table->decimal('expense_amount', $precision = 8, $scale = 2);
             $table->longText('description');
             $table->decimal('dollar_value', $precision = 8, $scale = 2);
             $table->decimal('cost_per_dollar',$precision = 8, $scale = 2);
             $table->date('date');
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
        Schema::dropIfExists('expenses');
    }
}
