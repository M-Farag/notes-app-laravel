<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotesTest extends TestCase
{
	use RefreshDatabase;
    
    /** @test */
    public function logged_user_can_add_a_note(){
    	$this->withoutExceptionHandling();
    	$attributes = 
    	['title'=>'munchy is the note name','details'=>'here are some new details for the note'];
    	//given
    		$this->actingAs(factory('App\User')->create());
    	//when
    		$this->post('/notes',$attributes);
    	//then
    		$this->assertDatabaseHas('notes',$attributes);
    }

    /** @test */
    public function guest_cannot_add_a_note(){
    	//$this->withoutExceptionHandling();
    	//given
    		//no logged in user
    	//when & //then
    	$url = '/login';
    		$this->post('/notes')->assertRedirect($url);
    	
    }
}
