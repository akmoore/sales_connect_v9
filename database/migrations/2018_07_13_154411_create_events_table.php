<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eventable_type');
            $table->unsignedInteger('eventable_id');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->enum('type', ['shoot', 'edit', 'meeting']);
            $table->string('shoot_location')->nullable();
            $table->string('prepro_meeting_attendees')->nullable();
            // $table->string('notes')->nullable();
            $table->boolean('email')->default(false);
            $table->string('email_list')->nullable();
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
        Schema::dropIfExists('events');
    }
}
