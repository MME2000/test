<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
         $table->increments('id');
         $table->dateTime('dt_reg_date');
         $table->dateTime('dt_mod_date')->default('2021-12-12 10:10:10');
         $table->string('s_name');
         $table->string('s_username');
         $table->string('password');
         $table->string('s_secret')->default('null');
         $table->string('email');
         $table->string('s_website')->default('null');
         $table->string('s_phone_land')->default('null');
         $table->string('s_phone_mobile')->default('null');
         $table->tinyInteger('b_enabled')->default(1);
         $table->tinyInteger('b_active')->default(0);
         $table->string('s_pass_code')->default('null');
         $table->string('s_pass_date')->default('null');
         $table->string('s_pass_ip')->default('null');
         $table->string('fk_c_country_code')->default('null');
         $table->string('s_address')->default('null');
         $table->string('s_zip')->default('null');
         $table->integer('fk_i_region_id')->unsigned()->default(00);
         $table->string('s_region')->default('null');
         $table->integer('fk_i_city_id')->unsigned()->default(00);
         $table->string('s_city')->default('null');
         $table->integer('fk_i_city_area_id')->unsigned()->default(00);
         $table->string('s_city_area')->default('null');
         $table->decimal('d_coord_lat')->default(0.0);
         $table->decimal('d_coord_long')->default(0.0);
         $table->tinyInteger('b_company')->default(0);
         $table->integer('i_items')->unsigned()->default(0);
         $table->integer('i_comments')->unsigned()->default(0);
         $table->dateTime('dt_access_date')->default('2021-12-12 10:10:10');
         $table->dateTime('s_access_ip')->default('2021-12-12 10:10:10');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
