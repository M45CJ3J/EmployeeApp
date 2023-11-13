<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     */

     public function test_creating_employee(): void
    {
        $response = $this->post(route('store'), [
            'fname' => 'fname',
            'lname' => 'lname',
            'address' => 'address',
            'age' => 22,
            'birth_date' => '2023-11-01',
            'hired_date' => '2023-11-02',
            'department_id' => 1,
            'division' => 'division',
            'img_path' => 'img_path.jpg',

        ]);
 
        $response->assertStatus(200);
    }

    public function test_fetching_employee(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $this->assertSee('List of Employee
        '); 
    }
}
