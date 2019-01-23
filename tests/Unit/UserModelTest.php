<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class UserModelTest extends TestCase
{
	 use RefreshDatabase;
    /** @test */
    public function userhasnotes(){
    	//given
    	//user instance of a model
    	$user = factory('App\User')->create();
    	//when
    	//hitting eloquent relation
    	$user->notes()->create(['title'=>'munchynewnote','details'=>'munchy details are added in the go']);
    	//then
    	//select notes collection and compare
    	$this->assertEquals('munchynewnote',$user->notes->pluck('title')->first());
    }
}
