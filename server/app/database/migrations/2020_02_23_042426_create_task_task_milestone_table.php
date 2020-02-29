<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTaskMilestoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_task_milestone', function (Blueprint $table) {
            $table->integer("task_id")->unsigned();
            $table->integer("task_milestone_id")->unsigned();
            $table->primary(["task_id", "task_milestone_id"]);
            $table->foreign("task_id")->references("id")->on("tasks");
            $table->foreign("task_milestone_id")->references("id")->on("task_milestones");
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
        Schema::dropIfExists('task_task_milestone');
    }
}
