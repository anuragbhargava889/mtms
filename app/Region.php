<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gbrock\Table\Traits\Sortable;

/**
 * App\Region
 *
 * @property int $id
 * @property string $name
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tower[] $towers
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Region extends Model
{
    use Sortable;
    /**
     * @var string
     */
    protected $table = 'region';

    /**
     * @var array
     */
    protected $fillable = ['name', 'status'];

    /**
     * The attributes which may be used for sorting dynamically.
     *
     * @var array
     */
    protected $sortable = ['name', 'status'];

    /**
     * Get the users for the region.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Get the tower for the region.
     */
    public function towers()
    {
        return $this->hasMany('App\Tower');
    }
}
