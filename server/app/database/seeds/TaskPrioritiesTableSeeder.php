<?php

use App\TaskPriority;
use Illuminate\Database\Seeder;

class TaskPrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskPriority::create(["name" => "高"]);
        TaskPriority::create(["name" => "中"]);
        TaskPriority::create(["name" => "低"]);
    }
}
