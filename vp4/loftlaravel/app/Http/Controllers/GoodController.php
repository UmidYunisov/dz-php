<?php

namespace App\Http\Controllers;

use App\Good;
use App\Categorys;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function index()
    {
    	$goods = Good::All();
    	$data['goods'] = $goods;
    	return view('admin/index', $data);
    }
    public function show($id)
    {
    	$good = Good::find($id);
    	$data['good'] = $good;
    	return view('admin.show', $data);
    }
    public function create()
    {
        $category = Categorys::All();
        $data['category'] = $category; 
    	return view('admin.create',$data);
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
    		'price' => 'numeric|required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	]);
        
        $good = new Good();
        $image =  $request->file('image');
    	$good->name = $request->input('name');
        $good->category = $request->input('cat');
    	$good->price = $request->input('price');
        $good->photo = $image->hashName();
        $good->description = $request->input('description');
    	$good->save();
            if ($image) {
            echo "file found";
            $image->move('uploads', $image->hashName());
        }

    	return redirect('/admin/show/'.$good->id);
    }
    public function edit($id)
    {
    	$good = Good::find($id);
        $cat = Categorys::All();
    	$data['good'] = $good;
        $data['cat'] = $cat;
    	return view('admin.edit', $data);
    }
    public function update($id, Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required',
    		'price' => 'numeric|required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	]);
    	$good = Good::find($id);

        $image =  $request->file('image');
    	$good->name = $request->input('name');
    	$good->price = $request->input('price');
        $good->category = $request->input('cat');
        $good->description = $request->input('description');
        $good->photo = $image->hashName();
    	$good->save();

        $deletefile = $request->input('delete_file');
        if ($image) 
        {
            if (file_exists($deletefile)) 
            {
                unlink($deletefile);
            }
            $image->move('uploads', $image->hashName());
        }
    	return redirect('/admin/show/'.$good->id);
    }
    public function destroy($id)
    {
        $good = Good::find($id);
        $img = 'uploads/'.$good->photo;
        if(file_exists($img))
        {
            unlink($img);
        }
    	Good::destroy($id);
    	return redirect('/admin/');
    }
}
