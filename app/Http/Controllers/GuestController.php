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

        return view('welcome',compact('sliders','notices','videos'));
    }
    public function sponsor()
    {
        $partners = DB::table('partner')->get();

        return view('sponsor',compact('partners'));
    }
}
