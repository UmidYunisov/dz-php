<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use App\Orders;
use App\Categorys;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Good::All();
        $userid = Auth::user()->id;
        $category = Categorys::All();
        $data['goods'] = $goods;
        $data['user'] = $userid;
        $data['category'] = $category;
        if(Auth::user()->role !== 1)
            return view('/home', $data);
        else
            return view('/admin/index', $data);
    }
    public function show($id)
    {
        $good = Good::find($id);
        $email = Auth::user()->email;
        $category = Categorys::All();
        $data['category'] = $category;
        $data['good'] = $good;
        $data['email'] = $email;
        return view('single', $data);
    }
    public function order(Request $request)
    {
        if(isset($_POST['name']) && isset($_POST['email']))
        {
            $orders = new Orders();
            $orders->name = $_POST['name'];
            $orders->email = $_POST['email'];
            $orders->save();

        
        }
    }
    public function category($id)
    {
        $goods = Good::where('category', '=', $id)->get();
        $userid = Auth::user()->id;
        $category = Categorys::All();
        $data['goods'] = $goods;
        $data['user'] = $userid;
        $data['category'] = $category;
        return view('/category', $data);
    }
}
