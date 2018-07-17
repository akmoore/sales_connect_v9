<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('contactable_id')->nullable();
            $table->string('contactable_type')->nullable();
            $table->boolean('primary_contact')->default(false);
            // $table->boolean('news_personnel')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug')->nullable();
            $table->string('email');
            $table->string('position')->nullable();
            $table->string('work_phone')->nullable();
            // $table->string('work_phone_type')->nullable();
            $table->string('cell_phone')->nullable();
            // $table->string('secondary_phone_type')->nullable();
            $table->date('birthday')->nullable();
            $table->dateTime('start_date_at_company')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
