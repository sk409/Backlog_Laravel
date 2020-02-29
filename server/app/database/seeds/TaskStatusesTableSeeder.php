<?php

use App\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskStatus::create(["name" => "未対応"]);
        TaskStatus::create(["name" => "処理中"]);
        TaskStatus::create(["name" => "処理済み"]);
        TaskStatus::create(["name" => "完了"]);
    }
}
