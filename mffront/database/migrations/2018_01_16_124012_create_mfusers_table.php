<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMfusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfusers', function (Blueprint $newtable) {
          $newtable -> increments('id');
          $newtable -> string('name');
          $newtable -> string('last_name');
          $newtable -> integer('matrikel_nr',6);
          $newtable -> date('created');
          $newtable -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mfusers');
    }
}
