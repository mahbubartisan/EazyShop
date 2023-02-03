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
            $table->id();
            $table->string('product_name_eng');
            $table->string('product_name_hindi');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
            ->references('id')
            ->on('types')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
            ->references('id')
            ->on('brands')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->longText('thumb_image');
            $table->string('product_code');
            $table->string('product_qty');
            $table->text('short_dsc_eng');
            $table->text('short_dsc_hindi');
            $table->text('long_dsc_eng');
            $table->text('long_dsc_hindi');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->integer('hot_deal')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_deal')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('status')->default(0);
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
