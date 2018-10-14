<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies
        = [
            'App\Model' => 'App\Policies\ModelPolicy',
        ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::tokensExpireIn(now()->addDays(7));
        Passport::refreshTokensExpireIn(now()->addDays(365));
        Passport::enableImplicitGrant();

        Gate::define('conversation_access_gate',
            'App\Policies\ConversationPolicy@conversationAccess');
        Gate::define('user_access_gate',
            'App\Policies\UserPolicy@userAccess');
        Gate::define('sender_access_gate',
            'App\Policies\SenderPolicy@senderAccess');
        Gate::define('courier_access_gate',
            'App\Policies\CourierPolicy@courierAccess');
        Gate::define('package_access_gate',
            'App\Policies\PackagePolicy@packageAccess');
        Gate::define('package_accept_gate',
            'App\Policies\PackagePolicy@packageAccept');
    }
}
