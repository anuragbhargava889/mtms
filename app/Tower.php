<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gbrock\Table\Traits\Sortable;

/**
 * Class Tower
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property int $region_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Region $region
 * @method static \Illuminate\Database\Query\Builder|\App\Tower whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tower whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tower whereRegionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tower whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tower whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tower extends Model
{
    use Sortable;

    /**
     * @var string
     */
    protected $table = 'tower';

    /**
     * @var array
     */
    protected $fillable = ['name', 'region_id'];

    /**
     * The attributes which may be used for sorting dynamically.
     *
     * @var array
     */
    protected $sortable = ['id', 'name'];

    /**
     * Get region from tower
     */
    public function region()
    {
        return $this->belongsTo('App\Region');
    }
}
