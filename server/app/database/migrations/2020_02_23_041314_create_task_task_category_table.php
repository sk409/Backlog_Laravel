<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTaskCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_task_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("task_id")->unsigned();
            $table->integer("task_category_id")->unsigned();
            $table->foreign("task_id")->references("id")->on("tasks");
            $table->foreign("task_category_id")->references("id")->on("task_categories");
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
        Schema::dropIfExists('task_task_category');
    }
}
