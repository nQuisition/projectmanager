<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
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
        'owner_id', 'owner_organization_id', 'name', 'description',
    ];

    public function owner() {
        return $this->belongsTo('App\User')->select(['id', 'name', 'avatar']);
    }

    public function contributors() {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function taskGroups() {
        return $this->hasMany('App\TaskGroup');
    }

    public function tags() {
        return $this->hasMany('App\Tag');
    }
}
