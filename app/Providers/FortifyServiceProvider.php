<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                if (Auth::user()->peran == 'kasir' || Auth::user()->peran == 'manajer') {
                    return redirect(RouteServiceProvider::HOME);
                }else{
                    return redirect(route('pelanggan.index'));
                }
            }
        });
        $this->app->instance(RegisterResponse::class, new class implements RegisterResponse {
            public function toResponse($request)
            {
                if (Auth::user()->peran == 'kasir' || Auth::user()->peran == 'manajer') {
                    return redirect(RouteServiceProvider::HOME);
                }else{
                    return redirect(route('pelanggan.index'));
                }
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);


        RateLimiter::for('login', function (Request $request) {
            $username = (string) $request->username;

            return Limit::perMinute(5)->by($username.$request->ip());
        });

        // Fortify::authenticateUsing(function (Request $request) {
        //     $user = Pelanggan::where('username', $request->username)
        //     ->first();

        //     if (!$user) {
        //         $user = Karyawan::where('username', $request->username)
        //         ->first();
        //     }

        //     if ($user && Hash::check($request->password, $user->password)) {
        //         return $user;
        //     }
        // });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });
    }
}
