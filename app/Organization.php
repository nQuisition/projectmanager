<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function users() {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
