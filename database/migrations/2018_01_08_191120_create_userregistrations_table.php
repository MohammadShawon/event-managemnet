<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUser_registrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('visitor_type')->nullable();
            $table->integer('name_prefix')->nullable();
            $table->string('first_name',80);
            $table->string('last_name',80);
            $table->string('email',150)->nullable();
            $table->string('telephone',150);
            $table->string('mobile',20)->nullable();
            $table->string('company_name',150);
            $table->string('job_title',150);
            $table->string('country',150);
            $table->string('post_code',20);
            $table->string('address',250);
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
        Schema::dropIfExists('user_registrations');
    }
}
