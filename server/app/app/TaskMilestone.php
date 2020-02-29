<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskMilestone extends Model
{
    protected $fillable = ["name", "details", "start_on", "end_on", "project_id"];
}
