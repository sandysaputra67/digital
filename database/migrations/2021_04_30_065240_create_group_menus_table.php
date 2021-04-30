<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('restaurant_id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->boolean('main')->nullable();
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
        Schema::dropIfExists('group_menus');
    }
}
