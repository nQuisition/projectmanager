<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function taskGroup() {
        return $this->belongsTo('App\TaskGroup');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
