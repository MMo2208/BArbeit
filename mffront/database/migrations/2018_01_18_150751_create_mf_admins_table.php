<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMfAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mf_admins', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('name');
          $table->string('last_name');
          $table->string('role');
          $table->string('institution');
          $table->integer('pers_nr');
          $table->string('email');

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mf_admins');
    }
}
