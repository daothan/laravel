<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         Response::macro('caps', function ($str) {
            return Response::make(strtoupper($str));
        });

         Response::macro('signup',function($action){
            $signup = '
                <form action=".$action." method="POST" role="form">
                    <legend>Form Marco</legend>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="" placeholder="Name...">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control" id="" placeholder="Password...">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            ';
            return  $signup;
         });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
