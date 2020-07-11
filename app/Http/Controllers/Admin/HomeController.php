<?php

namespace App\Http\Controllers\Admin;

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

            $notices = Db::table('notice')->get();

            $videos = DB::table('video')->get();

            return view('admin.home',compact('sliders','notices','videos'));
        }
        else return redirect()->route('admin.login');
    }

    public function slider(Request $request)
    {
        if($request->hasFile('slider')){

            $filename = $request->slider->getClientOriginalName();
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

    public function notice(Request $request){
        if($request->hasFile('notice')){

            $filename = $request->notice->getClientOriginalName();
            $request->notice->storeAs('/public/notice',$filename);

            $data = array('title'=>$request->title,'name'=>$filename);

            DB::table('notice')->insert($data);

            $notice_success = 'Notice Uploaded Successfully';
            return redirect(route('admin').'#notice')->with('notice_success',$notice_success);
        }
        $notice_fail = 'Notice Upload Failed';
        return redirect(route('admin').'#notice')->with('notice_fail',$notice_fail);
    }

    public function notice_edit(Request $request){
        DB::table('notice')
            ->where('id',$request->id)
            ->update(['title'=>$request->title]);

        return redirect(route('admin').'#notice');
    }

    public function notice_delete(Request $request){
        $notice = DB::table('notice')->find($request->id);
        $name = $notice->name;
        $directory = 'storage/notice/'.$name;

        File::delete($directory);

        DB::table('notice')->where('id',$request->id)->delete();

        return redirect(route('admin').'#notice');
    }

    public function notice_view($id){
        $data = DB::table('notice')->where('id',$id)->first();
        $name = 'storage/notice/'.$data->name;
        if (File::isFile($name))
        {
            $file = File::get($name);

            $response = Response::make($file, 200);

            $infoPath = pathinfo(public_path($name));
            $extension = $infoPath['extension'];

            if($extension=='pdf')
                 $response->header('Content-Type', 'application/pdf');
            else{
                return Response::download($name, $data->name);
            }

            return $response;
        }
        return redirect(route('admin').'#notice');
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
}
