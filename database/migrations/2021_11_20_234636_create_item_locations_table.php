<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_locations', function (Blueprint $table) {
            $table->integer('fk_i_item_id')->unsigned();
            $table->char('fk_c_country_code',2)->nullable();
            $table->string('s_country')->nullable();
            $table->string('s_address')->nullable();
            $table->string('s_zip')->nullable();
            $table->integer('fk_i_region_id')->unsigned()->nullable();
            $table->string('s_region')->nullable();
            $table->integer('fk_i_city_id')->unsigned()->nullable();
            $table->string('s_city')->nullable();
            $table->integer('fk_i_city_area_id')->unsigned()->nullable();
            $table->string('s_city_area')->nullable();
            $table->decimal('d_coord_lat',10,6)->nullable();
            $table->decimal('d_coord_long',10,6)->nullable();

            $table->foreign('fk_i_item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('fk_c_country_code')->references('pk_c_code')->on('countries')->onDelete('cascade');
            $table->foreign('fk_i_region_id')->references('pk_i_id')->on('regions')->onDelete('cascade');
            $table->foreign('fk_i_city_id')->references('pk_i_id')->on('cities')->onDelete('cascade');
            $table->foreign('fk_i_city_area_id')->references('pk_i_id')->on('areas')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_locations');
    }
}
