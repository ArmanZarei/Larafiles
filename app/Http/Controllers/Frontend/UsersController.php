<?php

namespace App\Http\Controllers\Frontend;

use App\Events\UserRegistered;
use App\Http\Requests\FrontUserRequest;
use App\Http\Controllers\Controller;
use App\Jobs\LoggerTest;
use App\Mail\UserRegisteredWelcome;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
    public function register()
    {
        return view('front.users.register');
    }

    public function doRegister(FrontUserRequest $frontUserRequest)
    {
        $data = $frontUserRequest->only('name', 'password', 'email');

        $user = User::create($data);
        if ($user && $user instanceof User) {
            event(new UserRegistered($user));

            return redirect()->route('front.login')->with([
                'success' => true,
                'message' => 'Registration Successfully Completed.You may now login to your account.'
            ]);
        }

        return redirect()->route('front.register')->with([
            'error' => 'true',
            'message' => 'Error while registering. Please try again.'
        ]);
    }

    public function login()
    {
        return view('front.users.login');
    }

    public function doLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $remember = $request->has('remember');
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data, $remember)) {
            $job = (new LoggerTest("User Logged in : " . Auth::user()->name))
                ->onQueue('views')
                ->delay(Carbon::now()->addSeconds(5));
            dispatch($job);

            return redirect()->route('front.home')->with([
                'success' => true,
                'message' => 'You Logged in Successfully.'
            ]);
        }

        return redirect()->back()->with([
            'error' => true,
            'message' => 'Username or password is wrong.'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.home');
    }
}
