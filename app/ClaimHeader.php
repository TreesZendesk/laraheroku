<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ClaimHeader extends Model
{
    //
    protected $table = 'claim_header';
    protected $fillable = ['trx_id', 'claim_date', 'activity_code', 'client_code', 'employee_number', 'toll_from', 'toll_to', 'mileage', 'parking', 'meal', 'created_by', 'creation_date'];
    public $timestamps = false;

	public function setClaimDateAttribute($value)
	{
		$this->attributes['claim_date'] = Carbon::createFromFormat('d-m-Y', $value);
	}

	public function setCreationDateAttribute($value)
	{
		$this->attributes['creation_date'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
    function details() {
    	return $this->hasMany('App\ClaimDetail', 'trx_header_id', 'trx_id');
    }
}
