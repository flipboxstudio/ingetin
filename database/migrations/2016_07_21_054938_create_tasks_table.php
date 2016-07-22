<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('index');
            $table->text('name');
            $table->datetime('target_start_datetime');
            $table->datetime('target_end_datetime');
            $table->datetime('actual_start_datetime')->nullable()->default(null);
            $table->datetime('actual_end_datetime')->nullable()->default(null);
            $table->double('precent')->default(0);
            $table->enum('state', ['waiting', 'ongoing', 'finish'])->default('waiting');
            $table->timestamps();
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
