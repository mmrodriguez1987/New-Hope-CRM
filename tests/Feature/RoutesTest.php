<?php

namespace Tests\Feature;

use nhcrm\Http\Controllers;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {        
        $this->get('/')
        ->assertSuccessful();
    }

   
}
