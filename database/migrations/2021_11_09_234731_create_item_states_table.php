<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_states', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_i_item_id')->unsigned();
            $table->integer('i_num_views')->unsigned()->default(0);
            $table->integer('i_num_spam')->unsigned()->default(0);
            $table->integer('i_num_repeated')->unsigned()->default(0);
            $table->integer('i_num_bad_classified')->unsigned()->default(0);
            $table->integer('i_num_offensive')->unsigned()->default(0);
            $table->integer('i_num_expired')->unsigned()->default(0);
            $table->integer('i_num_premium_views')->unsigned()->default(0);
            $table->date('dt_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_states');
    }
}
