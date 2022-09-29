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
    public function index(Request $request)
    {
        //Recupero l'utente loggato per mostrare solo i suoi piatti
        $user = Auth::user();

        // $dishes = Dish::paginate(6);
        $dishes = Dish::orderBy('name','asc')->where('user_id', '=',$user->id )->paginate(6);
        $request_info= $request->all();
        $deleted_message = isset($request_info['deleted']) ? $request_info['deleted'] : null;
        // $this->getDifferentDay($dishes);
        $data = [
            'dishes'=> $dishes,
            'deleted_message' => $deleted_message,
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

        if ( ! $request->has('available')) {
            // Do something when checkbox isn't checked.
            $form_data['available'] = 0;
         } else {
            $form_data['available'] = 1;
         }

        $new_dish -> fill($form_data);
        
        // $new_dish->slug = $this->getSlug($new_dish->title);
        $new_dish->save();
    
        // Mail::to('admin@boolpress.com')->send(new NewPostAdminEmail($new_dish));

        $data = [
            'created' => 'yes',
            'dish' => $new_dish->id
        ];
        return redirect()->route('admin.dishes.show', $data);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        {
            $dish = Dish::findOrFail($id);
            $now = Carbon::now();
            $user = Auth::user();

            $request_info= $request->all();
            $created_message = isset($request_info['created']) ? $request_info['created'] : null;
            $updated_message = isset($request_info['updated']) ? $request_info['updated'] : null;

            $data = [
                'dish'=> $dish,
                'created_message' => $created_message,
                'updated_message' => $updated_message,
            ];   

            if($dish->user_id == $user->id){
                return view('admin.dishes.show', $data);
            } else {
                return abort(404);
            }
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
          $dish = Dish::findOrFail($id);
          $user = Auth::user();

            $data = [
                'dish'=> $dish
            ];

        if($dish->user_id == $user->id){
             
            return view('admin.dishes.edit', $data);
        } else {
            return abort(404);
        }
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
        $request->validate($this->getValidation());
        $form_data = $request->all();
        $dish_to_update = Dish::findOrFail($id);

        if ( ! $request->has('available')) {
            // Do something when checkbox isn't checked.
            $form_data['available'] = 0;
         } else {
            $form_data['available'] = 1;
         }

        if(isset($form_data['dish_cover'])) {
            if($dish_to_update->dish_cover){
                Storage::delete($dish_to_update->dish_cover);
            }
            $img_path = Storage::put('dish-covers', $form_data['dish_cover']);
            $form_data['dish_cover'] = $img_path;
        }

        // if ($form_data['title'] !== $post_to_update->title) {
        //     $form_data['slug'] = $this->getSlug($form_data['title']);
        //    }else{
        //     $form_data['slug'] = $post_to_update->slug;
        // }

        $dish_to_update->update($form_data);


        // $request_info= $request->all();
        // $updated_message = isset($request_info['updated']) ? $request_info['updated'] : null;

        $data = [
            'dish' => $dish_to_update->id,
            'updated' => 'yes',
        ];

        return redirect()-> route('admin.dishes.show', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    
    {
        {
            $delete_dish = Dish::findOrFail($id);
            // $delete_dish->tags()->sync([]);

            if($delete_dish->dish_cover){
                Storage::delete($delete_dish->dish_cover);
            }

            $delete_dish->delete();
            return redirect()->route('admin.dishes.index', ['deleted'=> 'yes']);    
        }
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

    // protected function getDifferentDay($dishes){
    //     $today = Carbon::now();
    //     foreach($dishes as $dish){
    //         $dish['updated_days_ago'] = $dish -> updated_at-> diffInDays($today);
    //     }
    // }
}
