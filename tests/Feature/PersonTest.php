<?php

namespace Tests\Feature;

use newhopecrm\Person;
use newhopecrm\User;
//use newhopecrm\Persontype;
//use newhopecrm\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Passport\Client;
use Laravel\Passport\Passport;

class PersonTest extends TestCase
{
    use RefreshDatabase;
    protected $user, $persontype, $position;


    public function setUp() : void { 
        parent::setUp();
        $this->user = factory(User::class)->create();
        //$this->persontype = factory(Persontype::class)->create();
        //$this->position = factory(Position::class)->create();

        $this->actingAs($this->user);

        Passport::actingAsClient(
            factory(User::class)->create(),
            ['check-status']
        );
    }
    
    /**
     * Unit test for Controller PersonController@index
     *
     * @return void
     */
    public function test_can_list_persons() {
        $persons = factory(Person::class,20)->create();

        $response = $this->get('/api/person?search=&orderBy=id&desc=true')            
             ->assertSuccessful();
        
        
       
    
        $response->dumpHeaders();

        $response->dumpSession();
     
        $response->dump(); 
    }

   
}
