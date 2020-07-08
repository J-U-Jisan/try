<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function partner(Request $request){
        if($request->hasFile('logo')){

            $filename = $request->logo->getClientOriginalName();
            $request->logo->storeAs('/public/partner',$filename);

            $data = array('title'=>$request->title,'name'=>$filename);

            DB::table('partner')->insert($data);

            $partner_success = 'Partner Added Successfully';
            return redirect(route('admin').'#partner')->with('partner_success',$partner_success);
        }
        $partner_fail = 'Partner Upload Failed';
        return redirect(route('admin').'#partner')->with('partner_fail',$partner_fail);
    }

    public function partner_edit(Request $request){
        DB::table('partner')
            ->where('id',$request->id)
            ->update(['title'=>$request->title]);

        return redirect(route('admin').'#partner');
    }
    public function partner_delete(Request $request){
        $partner = DB::table('partner')->find($request->id);
        $name = $partner->name;
        $directory = 'storage/partner/'.$name;

        File::delete($directory);

        DB::table('partner')->where('id',$request->id)->delete();

        return redirect(route('admin').'#partner');
    }
}
