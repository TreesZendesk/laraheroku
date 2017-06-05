<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Employee;

class EmployeeTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_has_row_yanick_norman()
    {   
        $this->assertDatabaseHas('emp_mst', [
            'employee_name' => 'Janick Norman'
        ]);
    }
}