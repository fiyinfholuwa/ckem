<?php

namespace App\Providers;

use App\Models\AdminRole;
use Illuminate\Support\ServiceProvider;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $user_role = Auth::user()->user_role;
                $permission = null;
                if (!is_null($user_role)) {
                    $permission = AdminRole::where('id', $user_role)->first();
                    $permissions = json_decode($permission->permission, true);
                    $view->with('permissions', $permissions);
                }

            }
        });
    }
}
