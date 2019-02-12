<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakerManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speaker_management', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('speaker_type_id');
            $table->string('name', 150);
            $table->string('title', 150);
            $table->string('company', 150);
            $table->string('mobile', 25);
            $table->string('email', 150);
            $table->mediumText('description')->nullable()->default(null);
            $table->string('profile_image', 150)->nullable()->default(null);
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
        Schema::dropIfExists('speaker_management');
    }
}
