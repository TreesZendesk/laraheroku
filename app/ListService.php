<?php

namespace App;

use Project;
use Customer;

class ListService
{
    private $project;
    private $customer;

    public function __construct(Project $project, Customer $customer) {
    	$this->project = $project;
    	$this->customer = $customer;
    }
}
