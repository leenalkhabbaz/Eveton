<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test()
    {
        $json = '
        {
            "period_of_copun" : "11",
            "datefinish" : "18\10\2011",
            "amount" : "11",
            "code_owner":"1234",
            "admin_id":"6",
        }';
       // $response = $this->post('copon');

        $response=$this->json('POST','copon', ['period_of_copun'=>'11'
        ,'datefinish'=>'2022-01-19 03:14:07'
        ,'amount'=>'11'
        ,'code_owner'=>'1234'
        ,'admin_id'=>'6',
    ]
        );
        $response->assertStatus(201)->assertjson(['created'=>true]);
        //->assertsee('datefinish')->assertsee('period_of_copun')->assertsee('amount')->assertsee('code_owner')->assertsee('admin_id');
    }

}
