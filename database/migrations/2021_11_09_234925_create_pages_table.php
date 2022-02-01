<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('pk_i_id');
            $table->string('s_internal_name');
            $table->tinyInteger('b_indelible');
            $table->tinyInteger('b_link');
            $table->dateTime('dt_pub_date');
            $table->dateTime('dt_mod_date');
            $table->integer('i_order');
            $table->text('s_meta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
