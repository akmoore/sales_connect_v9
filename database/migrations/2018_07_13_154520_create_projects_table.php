<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('acknowledged')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->enum('type', ['production', 'promotions']);
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            // $table->dateTime('air_date_start')->nullable();
            // $table->dateTime('air_date_end')->nullable();
            // $table->dateTime('expected_finished_edit_date')->nullable();
            $table->dateTime('approved_by_client')->nullable();
            $table->dateTime('approved_by_sales_manager')->nullable();
            $table->dateTime('script_approved')->nullable();
            $table->integer('project_fee')->default(0);
            $table->dateTime('ready_to_air')->nullable();
            $table->enum('logo_graphic', ['house', 'client', 'na'])->nullable();
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
        Schema::dropIfExists('projects');
    }
}
