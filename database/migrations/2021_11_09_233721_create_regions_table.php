<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('pk_i_id');
            $table->string('fk_c_country_code')->nullable();
            $table->string('s_name');
            $table->string('s_slug')->unique();
            $table->tinyInteger('b_active')->default(1);

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
        Schema::dropIfExists('regions');
    }
}
