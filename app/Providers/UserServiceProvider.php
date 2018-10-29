<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \App\User::created(function($user){
            $historia = new \App\History;
            $historia->user_id = $user->id;
            $historia->name = $user->name;
            $historia->save();
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
