<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('project_id');
            // $table->unsignedInteger('manager_id');
            // $table->boolean('approved');
            // $table->text('message')->nullable();
            $table->unsignedInteger('project_id')->index();
            $table->enum('status', ['approved', 'rejected', 'pending', 'ingnored']);
            $table->date('approved_date')->nullable();
            $table->unsignedInteger('approved_by')->nullable();
            $table->date('rejected_date')->nullable();
            $table->unsignedInteger('rejected_by')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('approvals');
    }
}
