<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'VAT_number' => ['required', 'string', 'max:11', 'min:11'],
            'user_cover' => ['mimes:jpeg,jpg,png', 'max:1024'],
            'categories' => ['required'],
            // 'user_cover' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     * 
     */
    protected function create(array $data)
    {      
        // dd($data);
        // $user = User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'address' => $data['address'],
        //     'VAT_number' => $data['VAT_number'],
        //     'user_cover' => $data['user_cover'],
            
        //     'password' => Hash::make($data['password']),
        // ]);

        // return 

        if(isset($data['user_cover'])){
            $img_path = Storage::put('user-covers', $data['user_cover']);
            $data['user_cover'] = $img_path;
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'VAT_number' => $data['VAT_number'],
            'user_cover' => $data['user_cover'],
            'password' => Hash::make($data['password']),
        ]);

        $user->categories()->sync($data['categories']);

        return $user;
    }

    public function showRegistrationForm()
    {
        $categories = \App\Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('auth.register', $data);
    }
}
