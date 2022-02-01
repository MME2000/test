<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->dateTime('dt_pub_date');
            $table->dateTime('dt_mod_date')->nullable();
            $table->bigInteger('i_price')->nullable();
            $table->string('s_contact_name')->default('null');
            $table->string('s_contact_email');
            $table->string('s_ip')->default('');
            $table->tinyInteger('b_premium')->default(0);
            $table->tinyInteger('b_enabled')->default(1);
            $table->tinyInteger('b_blocked')->default(0);
            $table->tinyInteger('b_active')->default(0);
            $table->tinyInteger('b_spam')->default(0);
            $table->string('s_secret')->default('null');
            $table->tinyInteger('b_show_email')->default(0);
            $table->string('description');
            $table->dateTime('dt_expiration');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
