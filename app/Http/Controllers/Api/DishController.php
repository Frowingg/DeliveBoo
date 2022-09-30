<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Dish;

class DishController extends Controller
{
    public function index() {
        $dishes = Dish::paginate(6);

        foreach($dishes as $dish) {
            if($dish->dish_cover) {
                $dish->dish_cover = asset('storage/' . $dish->dish_cover);
            }
        }

        $data = [
            'success' => true,
            'results' => $dishes
        ];

        return response()->json($data);
        
    }
}
