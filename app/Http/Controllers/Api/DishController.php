<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Dish;
use App\Http\Resources\DishResource;

class DishController extends Controller
{
    public function index() {
        // $dishes = Dish::paginate(6);
        $dishes = Dish::all();
        
        $data = [
            'success' => true,
            'results' => $dishes
        ];

        return response()->json($data);
    }


    // public function indexResource(Request $request){
    //     $dishess = Dish::all();
    //     return DishResource::collection($dishess);
    // }
}
