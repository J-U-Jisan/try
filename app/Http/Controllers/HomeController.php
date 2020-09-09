<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return redirect()->route('welcome');
    }

    public function dashboard()
    {
        $donations = DB::table('donation')
                    ->where('user', auth()->user()->id)
                    ->latest()
                    ->paginate(10,['*'],'info');

        return view('dashboard',compact('donations'));
    }
}
