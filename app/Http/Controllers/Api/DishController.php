<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Dish;

class DishController extends Controller
{
    public function index() {
        // $dishes = Dish::paginate(6);
        $dishes = Dish::all();
        
        // $dishes = Dish::where('user_id', '=', $id)->get();

        // foreach($dishes as $dish) {
        //     if($dish->dish_cover) {
        //         $dish->dish_cover = asset('storage/' . $dish->dish_cover);
        //     }
        // }

        $data = [
            'success' => true,
            'results' => $dishes
        ];

        return response()->json($data);

    }

    // public function show($id, Request $request)
    // {
    //     {
    //         $dish = Dish::findOrFail($id);
    //         $now = Carbon::now();
    //         $user = Auth::user();

    //         $request_info= $request->all();
    //         $created_message = isset($request_info['created']) ? $request_info['created'] : null;
    //         $updated_message = isset($request_info['updated']) ? $request_info['updated'] : null;

    //         $data = [
    //             'dish'=> $dish,
    //             'created_message' => $created_message,
    //             'updated_message' => $updated_message,
    //         ];   

    //         if($dish->user_id == $user->id){
    //             return view('admin.dishes.show', $data);
    //         } else {
    //             return abort(404);
    //         }
    //     }
}
