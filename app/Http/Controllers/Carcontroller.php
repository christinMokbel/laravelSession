<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Category;

use App\Traits\Common;


class Carcontroller extends Controller
{
    use Common;
    //session5
    private $columns =['title', 'description', 'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars =Car::get();
        return view('cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('addCar');
        //session10
       $categories=Category::get();
       return view('addCar', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //session4
        //return dd($request->request);
        // $car= new Car();
        // $car->title=$request->title;
        // $car->description=$request->description;
        // if(isset($request->published)){
        //     $car->published=1;
        // }else{
        //     $car->published=0;
        // };
        // $car->save();
        // return 'data added successfully';

        //session5
        // $data=$request->only($this->columns);
        // $data['published']=isset($request->published);
        // Car::create($data);
        // return redirect('cars');

        //session6
        // $data = $request ->validate ([
        //     'title'=>'required|string|max:50',
        //     'description'=>'required|string',

        // ]);
        // $data['published']=isset($request->published);
        // Car::create($data);
        // return redirect('cars');

       //session7
            // $messages=[
            // 'title.required'=>'العنوان مطلوب',
            // 'title.string'=>'Should be string',
            // 'description.required'=> 'should be text',
            // ];
            $messages = $this->messages();
        //session7,session10
        $data = $request ->validate ([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' =>'required|string',

        ], $messages);
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image'] = $fileName;
        $data['published']=isset($request->published);
        Car::create($data);
        return redirect('cars');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car=Car::findOrFail($id);
        return view('showcar', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //$car=Car::findOrFail($id);
        //return view('updatecar', compact('car'));

        //session10
        $car = Car::findOrFail($id);
        $categories = Category::get();
        return view('updateCar', compact('car','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //session5
        // $data=$request->only($this->columns);
        // $data['published']=isset($request->published);
        // Car::where('id', $id)->update($data);
        // return redirect('cars');

        //task session7
        // $messages = $this->messages();
    
        // $data = $request ->validate ([
        //     'title'=>'required|string|max:50',
        //     'description'=>'required|string',
        //     'image' => 'image|mimes:png,jpg,jpeg|max:2048',

        // ], $messages);
        // $image = $request->file('image');
        // if($image){
        // $fileName = $this->uploadFile($image, 'assets/images');    
        // $data['image'] = $fileName;
        // }else{
        //  $car= Car::findOrFail($id);
        //  $data['image']=$car->image;
        // }
        // $data['published']=isset($request->published);
        // Car::where('id', $id)->update($data);
        // return redirect('cars');

        //solution session7
        $messages = $this->messages();
        $data = $request->validate([
             'title'=>'required|string|max:50',
             'description'=> 'required|string',
             'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
             'category_id'=>'required',
            ], $messages);

            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/images');    
                $data['image'] = $fileName;
                //تمسح الصورة من على سيرفر
                //unlink("assets/images/" . $request->oldImage);
            }
            
            $data['published'] = isset($request->published);
            Car::where('id', $id)->update($data);
            return redirect('cars');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect('cars');
    }
    public function trashed()
    {
        $cars=Car::onlyTrashed()->get();
        return view('trashed', compact('cars'));
    }

    public function forceDelete(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return redirect('cars');
    }

    public function restore(string $id)
    {
        Car::where('id', $id)->restore();
        return redirect('cars');
    }

    public function messages(){
        return[
                'title.required'=>'العنوان مطلوب',
                'title.string'=>'Should be string',
                'description.required'=> 'should be text',
                'image.required'=> 'Please be sure to select an image',
                'image.mimes'=> 'Incorrect image type',
                'image.max'=> 'Max file size exceeded',
        ];
    }

}
