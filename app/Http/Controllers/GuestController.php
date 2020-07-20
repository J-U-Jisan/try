<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class GuestController extends Controller
{
    public function index()
    {
        $sliders = DB::table('slider')->get();
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
        return view('welcome',compact('sliders','videos','events'));
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

    public function member()
    {
        $members = DB::table('member')
                    ->paginate(9,['*'],'member');

        return view('member',compact('members'));
    }

    public function contact()
    {
        return view('contact');
    }
    public function contact_mail(Request $request){
        $details = [
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'comment'=>$request->message
        ];

        Mail::send('email.contact', $details, function ($message) use ($request)
        {
            $message->from($request->email);
            $message->to(config('mail.from.address'))->subject($request->subject);
        });
        return back()->with('success', 'Thanks for contacting us!');
    }


    public function volunteer(){
        return view('volunteer');
    }
    public function volunteer_store(Request $request){
        $data = array('firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'gender'=>$request->gender,
            'address'=>$request->address);
        DB::table('volunteer')->insert($data);

        $message = 'Registration successful. You will be notified when we approve you as volunteer';
        return redirect(route('volunteer'))->with('message',$message);
    }
}
