<?php

namespace App\Http\Controllers\Admin;

use App\Mail\VolunteerApprovalMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function index()
    {
        if(Session::get('user')!=''){

            $sliders = DB::table('slider')->get();

            $videos = DB::table('video')->get();

            $approval_list = DB::table('volunteer')
                            ->where('approve',0)
                            ->paginate(5,['*'], 'approval');

            $volunteer_list = DB::table('volunteer')
                    ->where('approve',1)
                    ->paginate(5,['*'], 'volunteer');

            $contact_list = DB::table('footer')->get();

            return view('admin.home',compact('sliders','videos','approval_list','volunteer_list','contact_list'));
        }
        else return redirect()->route('admin.login');
    }

    public function password_change(Request $request){
        if($request->password != $request->confirm){
            $message = 'Password Mismatched';
            return redirect()->route('admin')->withErrors($message);
        }
        else{
            DB::table('admin')->where('id',1)->update(['password'=>$request->password]);

            $message = 'Password Changed Successfully';
            return redirect()->route('admin')->with('message',$message);
        }
    }

    public function slider(Request $request)
    {
        if($request->hasFile('slider')){
            $slider = DB::table('slider')->get()->last();
            if(isset($slider)){
                $id= $slider->id;
            }
            $id = ($id ?? 0)  + 1;

            $filename = 'slider' . $id . '.' . $request->slider->getClientOriginalExtension();
            $request->slider->storeAs('/public/slider',$filename);

            $data = array('name'=>$filename);

            DB::table('slider')->insert($data);
            $slider_success = 'Image Uploaded Successfully';
            return redirect(route('admin').'#slider')->with('slider_success',$slider_success);
        }
        $slider_fail = 'Image Upload Failed';
        return redirect(route('admin').'#slider')->with('slider_fail',$slider_fail);
    }
    public function slider_delete(Request $request){
        $slider = DB::table('slider')->find($request->id);
        $name = $slider->name;
        $directory = 'storage/slider/'.$name;

        File::delete($directory);

        DB::table('slider')->where('id',$request->id)->delete();

        return redirect(route('admin').'#slider');
    }

    public function video(Request $request){
        if(isset($request->submit)){

            $cnt = DB::table('video')->count();

            if($cnt<2){
                $data = array('link'=>$request->video);
                DB::table('video')->insert($data);

                return redirect(route('admin').'#video');
            }
            else{
                return redirect(route('admin').'#video')->with('videoFail','Already Uploaded 2 Video');
            }
        }
    }

    public function video_delete(Request $request){
        DB::table('video')->where('id',$request->id)->delete();
        return redirect(route('admin').'#video');
    }

    public function approve_action(Request $request){
        if(isset($request->approve)){
            DB::table('volunteer')->where('id',$request->id)->update(['approve'=>1]);

            $details = [
              'title'=>'Approval From Try',
                'body'=>'Congratulations, now you are one of us. We approved you as a volunteer of TRY.',
                'pathToImage' => public_path()."/images/logo.png"
            ];
            Mail::to($request->email)->send(new VolunteerApprovalMail($details));
        }
        else if(isset($request->decline)){
            DB::table('volunteer')->where('id',$request->id)->delete();
        }
        return redirect(route('admin').'#approve');
    }

    public function volunteer_delete(Request $request){
        DB::table('volunteer')->where('id',$request->id)->delete();

        return redirect(route('admin').'#volunteer');
    }

    public function footer(Request $request){
        $cnt = DB::table('footer')->count();

        if($cnt<2){
            $data = array('mobile'=>$request->mobile,'email'=>$request->email);
            DB::table('footer')->insert($data);

            return redirect(route('admin').'#footer');
        }
        else{
            return redirect(route('admin').'#footer')->with('footerFail','Already Added 2 Number');
        }
    }
    public function footer_action(Request $request){
        if(isset($request->edit)){
            DB::table('footer')->where('id',$request->id)
                                    ->update(['mobile'=>$request->mobile,'email'=>$request->email]);
        }
        else{
            DB::table('footer')->where('id',$request->id)
                                    ->delete();
        }
        return redirect(route('admin').'#footer');
    }
}
