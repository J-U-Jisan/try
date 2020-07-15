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
        $events = DB::table('event')
            ->where('event',2)
            ->orWhere('event',1)
            ->get();
        $cnt = $events->count();
        if($cnt<4){
            $cnt = 4 - $cnt;
            $closed = DB::table('event')
                ->where('event',3)
                ->latest('id')
                ->limit($cnt)
                ->get();

            $events = $events->concat($closed);
        }

        return view('welcome',compact('sliders','notices','videos','events'));
    }
    public function partner()
    {
        $partners = DB::table('partner')->get();

        return view('sponsor',compact('partners'));
    }

    public function event_view($id){

        $event = DB::table('event')->where('id',$id)->first();

        return view('eventView',compact('event'));
    }

    public function event(){
        $upcomings = DB::table('event')
            ->where('event',1)
            ->latest('id')
            ->paginate(3,['*'], 'upcoming');

        $ongoings = DB::table('event')
            ->where('event',2)
            ->latest('id')
            ->paginate(3,['*'], 'ongoing');

        $closed_list = DB::table('event')
            ->where('event',3)
            ->latest('id')
            ->paginate(3,['*'], 'closed');

        return view('event', compact('upcomings','ongoings', 'closed_list'));
    }
}
