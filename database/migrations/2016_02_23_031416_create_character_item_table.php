<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_item', function(Blueprint $table){
            $table->integer('character_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('quantity')->default(1);
            $table->index(['character_id', 'item_id']);
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
        Schema::drop('character_item');
    }
}
