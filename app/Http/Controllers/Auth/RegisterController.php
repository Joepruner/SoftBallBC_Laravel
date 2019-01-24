<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
<<<<<<< HEAD
     * Get a validator for an incoming registration request.
=======
     * Get a validator for an incoming registration request.name
>>>>>>> 04d41c5d65d827a3a897346e4a244eb72df8cda2
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
<<<<<<< HEAD
            'name' => 'required|max:255',
=======

            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
>>>>>>> 04d41c5d65d827a3a897346e4a244eb72df8cda2
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
<<<<<<< HEAD
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
=======
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'birth_date' => $data['birth_date'],
            'phone' => $data['phone'],
            'address_line_1' => $data['address_line_1'],
            'address_line_2' => $data['address_line_2'],
            'city' => $data['city'],
            'province' => $data['province'],
            'zip_code' => $data['zip_code'],
            'country' => $data['country'],

>>>>>>> 04d41c5d65d827a3a897346e4a244eb72df8cda2
        ]);
    }
}
