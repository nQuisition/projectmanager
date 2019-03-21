<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'name', 'description', 'color',
    ];

    public function project() {
        return $this->belongsTo('App\Project');
    }

    public function tasks() {
        return $this->belongsToMany('App\Task')->withTimestamps();
    }
}
