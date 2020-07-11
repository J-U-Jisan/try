<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index()
    {
        $sliders = DB::table('slider')->get();
        $notices = DB::table('notice')->get();
        $videos = DB::table('video')->get();
        $ongoings = DB::table('event')->where('event',2)->get();

        return view('welcome',compact('sliders','notices','videos','ongoings'));
    }
    public function partner()
    {
        $partners = DB::table('partner')->get();

        return view('sponsor',compact('partners'));
    }
}
