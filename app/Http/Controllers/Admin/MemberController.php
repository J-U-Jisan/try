<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $members  = DB::table('member')->get();
        return view('admin.member',compact('members'));
    }

    public function create(Request $request){
        if($request->hasFile('image')){
            $member = DB::table('member')->get()->last();
            if(isset($member)){
                $id= $member->id;
            }
            $id = ($id ?? 0)  + 1;

            $filename = 'member' . $id . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('/public/member',$filename);

            $data = array('image'=>$filename, 'name'=>$request->name, 'rank'=>$request->rank, 'mobile'=>$request->mobile, 'email'=>$request->email);

            DB::table('member')->insert($data);

            $member_success = 'Member Added Successfully';
            return redirect(route('admin.member'))->with('member_success',$member_success);
        }
        $member_fail = 'Member Addition Failed';
        return redirect(route('admin.member'))->with('member_fail',$member_fail);
    }

    public function action(Request $request){
        if(isset($request->edit)){
            DB::table('member')
                ->where('id',$request->id)
                ->update(['name'=>$request->name, 'rank'=>$request->rank, 'mobile'=>$request->mobile, 'email'=>$request->email]);
        }
        else if(isset($request->delete)){
            $member = DB::table('member')->find($request->id);
            $image = $member->image;
            $directory = 'storage/member/'.$image;

            File::delete($directory);

            DB::table('member')
                ->where('id',$request->id)
                ->delete();

        }
        return redirect(route('admin.member'));
    }
}
