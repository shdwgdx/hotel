<?php

namespace App\Providers;

use App\Models\Advertisement;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Advertisement' => 'App\Policies\AdvertisementPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-advertisement', function ($user, $id) {
            $advertisement = Advertisement::find($id);
            return $user->id == $advertisement->user_id;
        });
    }
}
