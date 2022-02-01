<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('pk_i_id');
            $table->integer('fk_i_region_id')->unsigned();
            $table->string('s_name');
            $table->string('s_slug')->unique();
            $table->string('fk_c_country_code')->nullable();
            $table->tinyInteger('b_active')->default(1);

            $table->foreign('fk_i_region_id')->references('pk_i_id')->on('regions')->onDelete('cascade');
            $table->foreign('fk_c_country_code')->references('pk_c_code')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
