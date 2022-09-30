<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {

    $categories = Category::all();

    foreach($categories as $user) {
        if($user->user_cover) {
            $user->user_cover = asset('storage/' . $user->user_cover);
        }
    }

    $data = [
        'success' => true,
        'results' => $categories
    ];

    return response()->json($data);
    
    }
}
