<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {

        $users = User::with(['categories'])->get();
        // $current_user = Auth::user()->id;

        foreach($users as $user) {
            if($user->user_cover) {
                $user->user_cover = asset('storage/' . $user->user_cover);
            }
        }

        $data = [
            'success' => true,
            'results' => $users,
            // 'current_user' => $current_user
        ];

        return response()->json($data);
        
    }

    public function show($slug) {

        $user = User::where('slug', '=', $slug)->with(['categories'])->first();

        if($user) {
            $data =  [
                'success' => true,
                'results' => $user
            ];
        } else {
            $data = [
                'success' => false
            ];
        }

        return response()->json($data);
    }

    public function showFilteredUser($word) {

        $user = User::whereLike('name', $word)->get();
        
        dd($word);

        if($user) {
            $data =  [
                'success' => true,
                'results' => $user
            ];
        } else {
            $data = [
                'success' => false
            ];
        }

        return response()->json($data);
    }
}
