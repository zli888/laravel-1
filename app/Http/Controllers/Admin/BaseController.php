<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Category;

class BaseController extends Controller
{
    public function __construct()
    {
		//获取菜单
		$menu = DB::table('admin_menu')->where('status',1)->get(); 
		$menu = Category::unlimitLayer($menu,'fid','id');
		//获取用户
        $user = auth()->user();        
		return view()->share(['menu'=>$menu,'user'=>$user]);
    }
}
