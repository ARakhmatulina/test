<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishOrderTable extends Migration
{

    public function up() : void
    {
        Schema::create('dish_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_id')
                ->constrained();
            $table->foreignId('order_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('dish_order');
    }
}
