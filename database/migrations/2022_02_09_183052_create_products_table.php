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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('img');
            $table->string('cat_id');
            $table->string('form_type')->nullable();
            $table->float('price');
            $table->integer('min_limit')->nullable();
            $table->integer('max_limit')->nullable();
            $table->integer('no_of_count')->nullable();
            $table->string('is_monthly')->nullable();
            $table->text('short_intro')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
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
