<?php

use App\TaskType;
use Illuminate\Database\Seeder;

class TaskTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskType::create(["name" => "周知"]);
        TaskType::create(["name" => "タスク"]);
        TaskType::create(["name" => "質問"]);
        TaskType::create(["name" => "要望"]);
    }
}
