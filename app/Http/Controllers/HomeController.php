<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    { $auth_user_email=auth()->user()->email;

        //dd($auth_user_email);
        $auth_user_email=auth()->user()->email;
        $name=auth()->user()->first_name;

         //dd($name);

        $response = Http::post('https://209.97.168.200/hr/public/api/already_existing_user_role_api', [

            'email' => $auth_user_email,

        ]);
        $avatar_file=$response['avatar_file'];
        //dd($avatar_file);
        Session::put('avatar_file', $avatar_file);
        Session::put('name', $name);
        //dd(Session::get('avatar_file'));
        return view('dashboard');
    }
}
