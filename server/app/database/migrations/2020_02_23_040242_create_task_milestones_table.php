<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_milestones', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("details", 2048);
            $table->date("start_on");
            $table->date("end_on");
            $table->integer("project_id")->unsigned();
            $table->foreign("project_id")->references("id")->on("projects");
            $table->unique(["name", "project_id"]);
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
        Schema::dropIfExists('task_milestones');
    }
}
