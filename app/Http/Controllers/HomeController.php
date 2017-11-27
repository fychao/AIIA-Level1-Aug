<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $data = getData();
        shuffle ($data);
        $pick = $data[0];
        $usr = Auth::user();
        $usr['sn'] = str_replace(".jpg", "", preg_split("/\//", $usr['type'])[5]);
        $usr['img'] = str_replace("/var/www/html/imgs", "http://p.talkwood.info/imgs/", $usr['type']);
        return view('home', ['usr'=>$usr, "pick"=>$pick]);
    }
}
