<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function index()
    {
        if (Session::get('user') != '') {
            $upcomings = DB::table("event")
                ->where('event', 1)
                ->latest('id')->get();

            $ongoings = DB::table('event')
                ->where('event', 2)
                ->latest('id')->get();

            $closed_list = DB::table('event')
                ->where('event', 3)
                ->latest('id')
                ->paginate(3);

            return view('admin.event', compact('upcomings', 'ongoings', 'closed_list'));
        }
        else return redirect()->route('admin.login');
    }

    public function upcoming(Request $request)
    {
        if($request->hasFile('event')){
            $event = DB::table('event')->get()->last();
            if(isset($event)){
                $id= $event->id;
            }
            $id = ($id ?? 0)  + 1;

            $filename = 'event' . $id . '.' . $request->event->getClientOriginalExtension();
            $request->event->storeAs('/public/event',$filename);

            $data = array('name'=>$filename,'title'=>$request->title, 'details'=>$request->details,'event'=>1);

            DB::table('event')->insert($data);

            $event_success = 'Event Added Successfully';
            return redirect(route('admin.event').'#upcoming')->with('event_success',$event_success);
        }
        $event_fail = 'Event Upload Failed';
        return redirect(route('admin.event').'#upcoming')->with('event_fail',$event_fail);
    }

    public function upcoming_action(Request $request){
        if(isset($request->edit)){
            DB::table('event')
                ->where('id',$request->id)
                ->update(['title'=>$request->title, 'details'=>$request->details]);
        }
        else if(isset($request->delete)){
            $event = DB::table('event')->find($request->id);
            $name = $event->name;
            $directory = 'storage/event/'.$name;

            File::delete($directory);

            DB::table('event')
                ->where('id',$request->id)
                ->delete();

        }
        else{
            DB::table('event')
                ->where('id',$request->id)
                ->update(['event'=>2]);
        }

        return redirect( route('admin.event').'#upcoming' );
    }

    public function ongoing(Request $request)
    {
        if($request->hasFile('event')){

            $event = DB::table('event')->get()->last();
            if(isset($event)){
                $id= $event->id;
            }
            $id = ($id ?? 0)  + 1;

            $filename = 'event' . $id . '.' . $request->event->getClientOriginalExtension();
            $request->event->storeAs('/public/event',$filename);

            $data = array('name'=>$filename,'title'=>$request->title, 'details'=>$request->details,'event'=>2);

            DB::table('event')->insert($data);

            $event_success = 'Event Added Successfully';
            return redirect(route('admin.event').'#ongoing')->with('ongoing_success',$event_success);
        }
        $event_fail = 'Event Upload Failed';
        return redirect(route('admin.event').'#ongoing')->with('ongoing_fail',$event_fail);
    }

    public function ongoing_action(Request $request){
        if(isset($request->edit)){
            DB::table('event')
                ->where('id',$request->id)
                ->update(['title'=>$request->title, 'details'=>$request->details]);
        }
        else if(isset($request->delete)){
            $event = DB::table('event')->find($request->id);
            $name = $event->name;
            $directory = 'storage/event/'.$name;

            File::delete($directory);

            DB::table('event')
                ->where('id',$request->id)
                ->delete();

        }
        else{
            DB::table('event')
                ->where('id',$request->id)
                ->update(['event'=>3]);
        }

        return redirect( route('admin.event').'#ongoing' );
    }

    public function closed(Request $request)
    {
        $event = DB::table('event')->find($request->id);
        $name = $event->name;
        $directory = 'storage/event/'.$name;

        File::delete($directory);

        DB::table('event')
            ->where('id',$request->id)
            ->delete();

        return redirect(route('admin.event').'#closed');
    }
}
