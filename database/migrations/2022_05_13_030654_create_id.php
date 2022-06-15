<?php

use App\Models\categories;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


    /**
     * Reverse the migrations.
     *
     * @return void
     */}
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropPrimary();
            $table->unsignedInteger('cate_id'); // for removing auto increment

        });
    }

}
