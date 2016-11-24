<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * @var string
     */
    protected $table = 'region';

    /**
     * @var array
     */
    protected $fillable = ['name', 'status'];

    /**
     * Get the users for the region.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
