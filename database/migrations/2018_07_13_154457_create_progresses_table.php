<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->dateTime('initialized')->nullable();
            $table->dateTime('sent_to_csm')->nullable();
            $table->dateTime('assigned_to_csp')->nullable();
            $table->dateTime('acknowledged_by_csp')->nullable();
            $table->dateTime('scheduled_pre_pro_meeting')->nullable();
            $table->dateTime('scheduled_shoot')->nullable();
            $table->dateTime('scheduled_edit')->nullable();
            $table->dateTime('first_edit_done')->nullable();
            $table->dateTime('script_approved')->nullable();
            $table->dateTime('approved_by_client')->nullable();
            $table->dateTime('approved_by_lsm')->nullable();
            $table->dateTime('sent_to_incoming')->nullable();
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
        Schema::dropIfExists('progresses');
    }
}
