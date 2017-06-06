<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClaimHeader;
use App\ClaimDetail;

class ClaimController extends Controller
{
    //
	function __construct() {

	}
    
    function bulkCreate(Request $request, ClaimHeader $header, ClaimDetail $detail) {
    	$headers = $request->get('claims');

    	$result = [];
    	foreach ($headers as $key => $header) {
    		$claim_header = ClaimHeader::create($header);
    		if (!ClaimHeader::create($header)) {
    			$result[$key] = ["error" => "error creating claim header"];
    		}	

    		if (count($claim_header['claims_details']) > 0) {
    			$claim_header->details()->createMany($claim_header['claims_details']);
    				
    		}
    			


    	}	
    	return $header->all();
    }

    function postHeader() {
   
    }

    function postDetails() {

    }
}
