<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\User;
use App\Policies\ArticlePolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {

        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            if ($user->admin == 1) {
                return Response::allow();
            }

            return Response::deny('Ошибка доступа');
        });

        Gate::define('user', function (User $user) {
            if ($user->active == 1) {
                return Response::allow();
            }

            return Response::deny('Ваш аккаунт не активирован');
        });
        //
    }

}
