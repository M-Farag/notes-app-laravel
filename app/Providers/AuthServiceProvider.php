<?php

namespace App\Providers;

//use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Note' => 'App\Policies\NotePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        //setup superSeeds
        $gate->before(function($user){
             if($user->group == 2){return true;}
        });
        

    }
}
