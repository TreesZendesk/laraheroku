<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimHeader extends Model
{
    //
    protected $table = 'claim_header';
    protected $fillable = ['trx_id', 'claim_date', 'activity_code', 'client_code', 'employee_number', 'toll_from', 'toll_to', 'mileage', 'parking', 'meal', 'created_by'];

    public $timestamps = false;

    function details() {
    	return $this->hasMany('App\ClaimDetail', 'trx_header_id', 'trx_id');
    }
}
