<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string("subject");
            $table->string("details", 2048);
            $table->double("scheduled_time");
            $table->double("actual_time")->nullable();
            $table->date("start_on");
            $table->date("due_on");
            $table->integer("task_priority_id")->unsigned();
            $table->integer("task_status_id")->unsigned();
            $table->integer("task_type_id")->unsigned();
            $table->integer("responsible_user_id")->unsigned();
            $table->integer("project_id")->unsigned();
            $table->foreign("task_priority_id")->references("id")->on("task_priorities");
            $table->foreign("task_status_id")->references("id")->on("task_statuses");
            $table->foreign("task_type_id")->references("id")->on("task_types");
            $table->foreign("responsible_user_id")->references("id")->on("users");
            $table->foreign("project_id")->references("id")->on("projects");
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
        Schema::dropIfExists('tasks');
    }
}
