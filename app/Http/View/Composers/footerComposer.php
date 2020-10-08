<?php


namespace App\Http\View\Composers;


use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class footerComposer
{
    public function compose(View $view){
        $footer_list = DB::table('footer')->get();

        $view->with('footer_list', $footer_list);
    }
}
