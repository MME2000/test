<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_comments', function (Blueprint $table) {
            $table->increments('pk_i_id');
            $table->integer('fk_i_item_id')->unsigned();
            $table->dateTime('dt_pub_date');
            $table->string('s_title');
            $table->string('s_author_name');
            $table->string('s_author_email');
            $table->text('s_body');
            $table->tinyInteger('b_enabled')->default(1);
            $table->tinyInteger('b_active')->default(0);
            $table->tinyInteger('b_spam')->default(0);
            $table->integer('fk_i_user_id')->unsigned()->nullable();

            $table->foreign('fk_i_item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('fk_i_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_comments');
    }
}
