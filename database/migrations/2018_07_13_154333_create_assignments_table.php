<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('solo_csp_id'); //solo creative services personnel that'll handle the entire project.
            $table->unsignedInteger('shooter')->nullable();
            $table->unsignedInteger('editor')->nullable();
            $table->unsignedInteger('scheduling')->nullable();
            $table->unsignedInteger('prepro')->nullable();
            $table->unsignedInteger('script')->nullable();
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
        Schema::dropIfExists('assignments');
    }
}
