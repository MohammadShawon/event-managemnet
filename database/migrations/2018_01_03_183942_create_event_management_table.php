<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_management', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 150);
            $table->mediumText('short_description', 250);
            $table->mediumText('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('venue');
            $table->string('lat', 200);
            $table->string('lng', 200);
            $table->date('pre_reg_start_date');
            $table->date('pre_reg_end_date');
            $table->string('organizar_logo', 150);
            $table->string('organizar_website', 100);
            $table->string('event_manager_logo', 150);
            $table->string('event_manager_website', 100);
            $table->string('approved_by_logo', 150);
            $table->string('approved_by_website', 100);
            $table->string('event_brochure_pdf', 150);
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
        Schema::dropIfExists('event_management');
    }
}
