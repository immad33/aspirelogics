<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenses;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories_list = Category::all();
        return view('home', compact('categories_list'));   
    }

    public function liveData(Request $request)
    {

        $dvData = DB::table('expenses')
               ->select('amount','date')
               ->where('user_id',  Auth::id())
               ->where('category_id',  $request->input('category_id'))
               ->get();

        $dataArray = array(
            'data'=>array(),
            'month'=>array()
        );
        
        foreach($dvData as $val)
        {
            array_push($dataArray['data'],$val->amount);
            array_push($dataArray['month'],$val->date);
        }
        
        return json_encode(array_filter($dataArray));
    }
}
