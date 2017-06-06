<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Model
{
	use Notifiable;
    //
    protected $table = "emp_mst";
}
