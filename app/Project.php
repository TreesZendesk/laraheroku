<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project_mst';

    protected $appends = ['total_distance'];

    protected $visible = ['project_number', 'project_name', 'total_distance'];

    public function getTotalDistanceAttribute($value)
    {
        return $this->attributes['standard_km_from'] + $this->attributes['standard_km_to'];
    }
}
