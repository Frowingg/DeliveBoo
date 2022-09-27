<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Dish;
use App\Category;
use App\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\NewPostAdminEmail;
use Carbon\Carbon;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::paginate(6);
        // $request_info= $request->all();
        $this->getDifferentDay($dishes);
        $data = [
            'dishes'=> $dishes,
            // 'deleted_message' => $deleted_message,
        ];

        return view('admin.dishes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $categories = Category::all();
            $data=[
                'categories' => $categories,
            ];
    
            return view('admin.dishes.create', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidation());
        $form_data = $request -> all();

        if(isset($form_data['dish_cover'])){
            $img_path = Storage::put('dish-covers', $form_data['dish_cover']);
            $form_data['dish_cover'] = $img_path;
        }

        $new_dish = new Dish();
        $user = Auth::user();
        $form_data['user_id'] = $user->id;

        $new_dish -> fill($form_data);
        
        if(!isset($form_data->available)){
            $new_dish['available'] = 0;
        }
        dd($new_dish);
        // $new_dish->slug = $this->getSlug($new_dish->title);
        $new_dish->save();
    
        // Mail::to('admin@boolpress.com')->send(new NewPostAdminEmail($new_dish));

        return redirect()->route('admin.dishes.show', ['dish' => $new_dish->id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            $dish = Dish::findOrFail($id);
            $now = Carbon::now();
    
            $data = [
                'dish'=> $dish 
            ];
    
            return view('admin.dishes.show', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function getValidation() {
        return [
            'name' => 'required|max:70',
            'ingredients' => 'required|max:3000',
            'description' => 'required|max:10000',
            'price' => 'required|numeric|between:0,999.99',
            'dish_cover' => 'nullable|file|mimes:jpeg,jpg,bmp,png'
        ];
    }

    protected function getDifferentDay($posts){
        $today = Carbon::now();
        foreach($posts as $post){
            $post['updated_days_ago'] = $post -> updated_at-> diffInDays($today);
        }
    }
}
