<?php

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
            $table->string('name', 50);
            $table->datetime('target_start_datetime');
            $table->datetime('target_end_datetime');
            $table->datetime('actual_start_datetime')->nullable()->default(null);
            $table->datetime('actual_end_datetime')->nullable()->default(null);
            $table->enum('state', ['waiting', 'ongoing', 'finish']);
            $table->double('precent')->default(0);
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
        Schema::drop('projects');
    }
}
