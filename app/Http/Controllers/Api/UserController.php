<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Admin\Dish;

class UserController extends Controller
{
    // public function index() {

    //     $users = User::with(['categories'])->get();
    //     $current_user = Auth::user()->id;

    //     foreach($users as $user) {
    //         if($user->user_cover) {
    //             $user->user_cover = asset('storage/' . $user->user_cover);
    //         }
    //     }

    //     $data = [
    //         'success' => true,
    //         'results' => $users,
    //         'current_user' => $current_user
    //     ];

    //     return response()->json($data);
        
    // }

    public function show($slug) {

        $user = User::where('slug', '=', $slug)->with(['categories'])->first();
        $user_id = $user->id;

        $dishes = Dish::where('user_id', '=', $user_id)->get();

        //dd($dishes);
        if($user) {
            $data =  [
                'success' => true,
                'results' => $dishes,
            ];
        } else {
            $data = [
                'success' => false
            ];
        }
        return response()->json($data);
    }
}
