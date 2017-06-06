<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\ClaimHeader;
use App\ClaimDetail;

class ClaimController extends Controller
{
    //
	function __construct() {

	}
    
    function bulkCreate(Request $request, ClaimHeader $header, ClaimDetail $detail) {
    	$headers = $request->input('claims_headers');

    	if (!$headers || !is_array($headers)) {
    		return response()->json(['error' => "invalid request body"])->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    	}

    	$result = [];
    	foreach ($headers as $key => $header) {
    		$claim_header = ClaimHeader::create($header);

    		if (!$claim_header) {
    			$result[$key] = ["error" => "error creating claim header"];
    		}	

    		$result[$key] = $claim_header->toArray();

    		if (count($header['claims_details']) > 0) {

    			$details = $claim_header->details()->createMany($header['claims_details']);
    			if (!$details) {
    				$result[$key]['details'] = ["error" => "error creating details"]; 
    			}	
    			$result[$key]['details'] = $details;		
    		}

    	}
    	$response = ['claims_headers' => $result];

    	return response()->json($response)->setStatusCode(Response::HTTP_OK);
    }

    function postHeader(Request $request) {
   		$data = $request->input('claim_header');

   			
    }

    function postDetails(Request $request) {
    	$data = $request->input('claim_header');
    }
}
