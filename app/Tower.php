<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{

    protected $table = 'tower';

    protected $fillable = ['name', 'region_id'];

    /**
     * Get region from tower
     */
    public function region()
    {
        return $this->belongsTo('App\Region');
    }
}
