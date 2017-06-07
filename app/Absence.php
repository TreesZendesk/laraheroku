<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $table = 'absence_trx'; 

    protected $fillable = ['date_from', 'date_to', 'project_number', 'employee_number', 'activity_status', 'created_by', 'creation_date'];
}