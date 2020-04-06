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
        //$this->user = factory(User::class)->create();
        //$this->persontype = factory(Persontype::class)->create();
        //$this->position = factory(Position::class)->create();

        //$this->actingAs($this->user);

        Passport::actingAsClient(
            factory(User::class)->create(),
            ['check-status']
        );
    }
    
    /** @test */
    public function if_person_is_listed() {
        $persons = factory(Person::class,20)->create();

        $this->get('/api/person/page=1&search=&orderBy=id&desc=true&rows=19')
             ->assertSuccessful()
             ->assertSee($persons[19]->question)
             ->assertDontSee($persons[0]->question);
    }

   
}
