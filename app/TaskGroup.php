<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskGroup extends Model
{
    use Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function project() {
        return $this->belongsTo('App\Project');
    }

    public function tasks() {
        return $this->hasMany('App\Task');
    }
}
