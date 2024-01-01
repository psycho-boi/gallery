<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Laravel\Ui\Presets\React;

class imageController extends Controller
{
    public function index()
    {
        // return view('index', ['images' => Image::get()]);
        return view('index', ['images' => Image::latest()->get()]);
    }

    public function create()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:100000',
            'category' => 'required',
            'name' => 'required'
        ]);
        

        $imageName = time() . '.' . $request->image->extension();
        $request ->image->move(public_path('image'), $imageName);

        $image = new Image;
        $image->image = $imageName;
        $image->name = $request->name;
        $image->category = $request->category;

        // $image->save();

        $image->save();

        return back()->withsuccess('image added successfully...!!!');
    }

    public function edit($id){
        $image = Image::where('id', $id)->first();
        return view('edit', ['image' => $image]);
    }

    public function update(Request $request, $id){
        // $request->validate([
        //     'image' => 'required|mimes:jpeg,png,jpg,gif|max:100000',
        //     'category' => 'required',
        //     'name' => 'required'
        // ]);

        $image = Image::where('id', $id)->first();

        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request ->image->move(public_path('image'), $imageName);
            $image->image = $imageName;
        }

        $image->name = $request->name;
        $image->category = $request->category;

         $image->save();

        return back()->withsuccess('image updated successfully...!!!');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // $images = Image::where('name', 'like', "%$keyword%")
        //                ->orWhere('category', 'like', "%$keyword%")
        //                ->get();

        // return view('index', compact('images'));

        return view('search', ['images' => Image::where('name', 'like', "%$keyword%")
        ->orWhere('category', 'like', "%$keyword%")
        ->get()]);
    }

}

