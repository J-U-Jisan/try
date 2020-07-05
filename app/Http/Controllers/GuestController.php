<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index()
    {
        $sliders = DB::table('slider')->get();
        return view('welcome',compact('sliders'));
    }
}
