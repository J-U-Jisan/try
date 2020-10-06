<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function blog(){
        $posts = DB::table("posts")
            ->latest('id')
            ->paginate(3, ['*'], 'post');
        foreach ($posts as $post){
            $post->created_at = Carbon::parse($post->created_at)->toDateString();
        }
        return view('blog', compact('posts'));
    }

    public function blog_view($id){

        $post = DB::table('posts')->where('id',$id)->first();
        $post->created_at = Carbon::parse($post->created_at)->toDateString();

        $comments = DB::table('comment')->where('post_id',$id)->get();

        return view('blogView',compact('post','comments'));
    }

    public function comment_store(Request $request){
        $data = array('name'=>$request->name,
            'post_id'=>$request->post_id,
            'comment'=>$request->comment
        );
        DB::table('comment')->insert($data);

        return back();
    }

    public function donation(){
        $image = DB::table('donation_image')->first();

        $methods = DB::table('payment_method')->get();


        return view('donation',compact('image','methods'));
    }

    public function donation_store(Request $request){
        $method = DB::table('payment_method')->where('id',$request->payment_method)->first();
        $data = array(
            'method'=> $method->payment_method,
            'account'=> $request->account,
            'amount' => $request->amount,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'received'=> 0,
            'user'=> $request->user,
        );

        $donation = DB::table('donation')->insert($data);

        if($donation)
            return redirect()
                ->back()
                ->with('success','Submitted Successfully');
        else
            return redirect()
                ->back()
                ->with('failed','Submission Failed. Try Again');
    }

    public function payment_account($method_id){
        $accounts = DB::table('accounts')
            ->where('method_id',$method_id)->get();

        return view('payment_account',compact('accounts'));
    }
    public function history(){
        return view('history');
    }
}
