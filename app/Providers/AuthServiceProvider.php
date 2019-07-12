<?php

namespace App\Providers;

use App\Policies\postPolicy;
use App\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
         post::class => postPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //my gate for test
		Gate::define("show-content",function ($user,$post=null){
			if ($user->id == $post['user_id']) {
//				dd('in karbar mitone post ra taghyir bede');
				return true;
			}
//			dd("in karbar mahdod ast va nemitone post ra taghyir bede");
			return false;
		});

    }
}
