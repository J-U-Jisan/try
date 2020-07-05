<?php

namespace App\Http\Controllers\Admin;

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
            return view('admin.home',compact('sliders'));
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
            return redirect(route('admin'))->with('slider_success',$slider_success);
        }
        $slider_fail = 'Image Upload Failed';
        return redirect(route('admin'))->with('slider_fail',$slider_fail);
    }
    public function slider_delete(Request $request){
        $slider = DB::table('slider')->find($request->id);
        $name = $slider->name;
        $directory = 'storage/slider/'.$name;

        File::delete($directory);

        DB::table('slider')->where('id',$request->id)->delete();

        return redirect()->route('admin');
    }
}
