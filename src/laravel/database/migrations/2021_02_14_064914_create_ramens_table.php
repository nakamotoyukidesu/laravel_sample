<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ramens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('twitter_id');
            $table->string('name');
            $table->string('category');
            $table->string('image_url');
            $table->string('address');
            $table->string('query');
            $table->string('account_name');
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
        Schema::dropIfExists('ramens');
    }
}
