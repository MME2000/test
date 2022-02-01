<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->string('s_md5');
            $table->string('fk_c_locale_code');
            $table->string('s_original_text');
            $table->string('s_anchor_text');
            $table->string('s_normalized_text');
            $table->integer('fk_i_category_id')->unsigned();
            $table->integer('fk_i_city_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keywords');
    }
}
