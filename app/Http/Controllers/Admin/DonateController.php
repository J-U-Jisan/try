<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use File;

class DonateController extends Controller
{
    public function index()
    {
        if (Session::get('user') != '') {

            $image = DB::table('donation_image')->first();

            $methods = DB::table('payment_method')->latest('id')->get();

            $accounts = DB::table('accounts')->get();

            $pendings = DB::table('donation')
                ->where('received',0)
                ->paginate(5,['*'],'pending');

            $confirms = DB::table('donation')
                        ->where('received',1)
                        ->latest('id')
                        ->paginate(5,'*','received');

            return view('admin.donation',compact('image','methods','accounts','pendings','confirms'));
        }
        else return redirect()->route('admin.login');
    }

    public function image(Request $request){
        if($request->hasFile('donation_image')){
            $image = DB::table('donation_image')->get()->last();
            if(isset($image)){
                $id= $image->id;
            }
            $id = ($id ?? 0)  + 1;

            $filename = 'image' . $id . '.' . $request->donation_image->getClientOriginalExtension();
            $request->donation_image->storeAs('/public/donation_image',$filename);

            $data = array('donation_image'=>$filename);

            DB::table('donation_image')->insert($data);

            $image_success = 'Image Added Successfully';
            return redirect(route('admin.donation'))->with('image_success',$image_success);
        }
        $image_fail = 'Image Upload Failed';
        return redirect(route('admin.donation'))->with('image_fail',$image_fail);
    }

    public function image_delete(Request $request){
        $image = DB::table('donation_image')->find($request->id);
        $name = $image->donation_image;
        $directory = 'storage/donation_image/'.$name;

        File::delete($directory);

        DB::table('donation_image')
            ->where('id',$request->id)
            ->delete();

        return back();
    }

    public function method(Request $request){
        $data = array('payment_method'=>$request->payment_method);
        DB::table('payment_method')->insert($data);

        return back();
    }

    public function method_delete($id){
        DB::table('payment_method')
            ->where('id',$id)
            ->delete();

        return back();
    }

    public function payment_id(Request $request, $id){
        $data = array('method_id'=>$id,
            'account_no'=>$request->account_no,
            'name'=>$request->name,
            'branch' => $request->branch,
            'routing_no' => $request->routing_no,
            'mobile_no' => $request->mobile_no,
            'is_agent' => $request->is_agent
        );
        DB::table('accounts')->insert($data);

        return back();
    }

    public function payment_id_delete($id){
        DB::table('accounts')
            ->where('id',$id)
            ->delete();

        return back();
    }

    public function action(Request $request,$id){
        if(isset($request->confirm)){
            DB::table('donation')
                ->where('id',$id)
                ->update(['received'=>1]);
        }
        else if(isset($request->delete)){
            DB::table('donation')
                ->where('id',$id)
                ->delete();
        }
        return back();
    }

    public function donation_delete($id){
        DB::table('donation')
            ->where('id',$id)
            ->delete();

        return back();
    }
}
