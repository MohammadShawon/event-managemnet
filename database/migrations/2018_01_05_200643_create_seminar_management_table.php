<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar_management', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('speaker_id');
            $table->string('title', 150);
            $table->mediumText('short_description', 250)->nullable()->default(null);
            $table->mediumText('description')->nullable()->default(null);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('room_hall', 150);
            $table->dateTime('registration_end_date_time');
            $table->string('feature_image', 150);
            $table->integer('status');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('seminar_management');
    }
}
