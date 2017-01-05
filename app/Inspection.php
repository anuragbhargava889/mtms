<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gbrock\Table\Traits\Sortable;

class Inspection extends Model
{
    use Sortable;

    protected $table = 'inspection';

    protected $fillable = ['title', 'detail', 'region_id', 'manager_id', 'local_technician_id', 'status', 'start_date' , 'end_date'];

    protected $sortable = ['title', 'detail','status', 'start_date' , 'end_date'];
}
