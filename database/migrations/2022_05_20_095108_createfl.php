<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createfl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
  {

    Schema::table('posts', function (Blueprint $table) {


        $table->foreign('kind_id')->references('id')->on('kinds')->onDelete('cascade');
    });
  }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
