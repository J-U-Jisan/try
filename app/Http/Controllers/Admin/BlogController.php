<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index(){
        if (Session::get('user') != '') {
            $posts = DB::table("posts")
                ->latest('id')
                ->paginate(3, ['*'], 'post');
            return view('admin.blog', compact('posts'));
        }
        else return redirect()->route('admin.login');
    }

    public function create(Request $request){

        if($request->hasFile('featured')){
            $posts = DB::table('posts')->get()->last();
            if(isset($posts)){
                $id= $posts->id;
            }
            $id = ($id ?? 0)  + 1;

            $filename = 'post' . $id . '.' . $request->featured->getClientOriginalExtension();
            $request->featured->storeAs('/public/post',$filename);

            $data = array('featured_image'=>$filename,'title'=>$request->title, 'details'=>$request->details, 'created_at'=>now());

            DB::table('posts')->insert($data);

            $post_success = 'Posted Successfully';
            return redirect(route('admin.blog'))->with('post_success',$post_success);
        }
        $post_fail = 'Post Failed';
        return redirect(route('admin.blog'))->with('post_fail',$post_fail);
    }

    public function action(Request $request){
        if(isset($request->edit)){
            DB::table('posts')
                ->where('id',$request->id)
                ->update(['title'=>$request->title, 'details'=>$request->details]);
        }
        else if(isset($request->delete)){
            $post = DB::table('posts')->find($request->id);
            $name = $post->featured_image;
            $directory = 'storage/event/'.$name;

            File::delete($directory);

            DB::table('posts')
                ->where('id',$request->id)
                ->delete();
        }
        return back();
    }
}
