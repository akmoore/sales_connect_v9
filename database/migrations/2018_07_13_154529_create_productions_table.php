<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->date('air_date');
            $table->date('edit_finish_date');
            $table->integer('length');
            $table->string('cart_number')->nullable();
            $table->string('isci')->nullable();
            $table->string('spot_location')->nullable();
            $table->enum('music_orgin', ['house', 'client'])->nullable();
            $table->string('music_track')->nullable();
            $table->enum('v_o', ['house', 'client', 'na'])->nullable();
            $table->enum('b_roll_source', ['house', 'client', 'na'])->nullable();
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
        Schema::dropIfExists('productions');
    }
}
