<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = ["name", "outline", "thumbnail_path"];

    public function tasks(): HasMany {
        return $this->hasMany((Task::class));
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
