<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->integer('amount');
            $table->string('unit');
            $table->string('machine_number')->nullable();
            $table->timestamp('buy_date')->nullable();
            $table->string('location');
            $table->string('condition');
            $table->string('status');
            $table->integer('price')->nullable();
            $table->string('pj');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->bigInteger('fund_id')->unsigned();
            $table->foreign('fund_id')->references('id')->on('funds');
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
        Schema::dropIfExists('inventories');
    }
}
