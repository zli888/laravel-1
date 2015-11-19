<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Category;

class MenuController extends BaseController
{	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data = DB::table('admin_menu')->get();
		$data = Category::unlimitLevel($data,'fid','id');
		//p($data);
        return view('admin.menu',compact('data'));
    }
	//菜单选择
	public function selectMenu($id='') {
		$data = DB::table('admin_menu')->get(); 
		$data = objectToArray($data);
		$data = Category::unlimitLevel($data,'fid','id');
		$options = "<option value='0'>==请选择==</option>";
		foreach ($data as $v)
		{
			$options .= "<option value='".$v['id']."'".($v['id']==$id ? ' selected="selected"' : '').">".$v['html'].$v['name']."</option>";
		}
		return $options;
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
		$selectMenu = $this->selectMenu(); //菜单选择	
        return view('admin.menuEdit',compact('selectMenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//p($request->only('fid','name','url','sort'));
		$data = $request->only('fid','name','url','sort');
		$data['status']=1;
		if(DB::table('admin_menu')->insert($data))
		{
			return redirect('admin/menu');
		}
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {		       	
        $data = DB::table('admin_menu')->where('id',$id)->first();
		$selectMenu = $this->selectMenu($data->fid); //菜单选择	  	
        return view('admin.menuEdit',compact('selectMenu','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('fid','name','url','sort');
		$data['status']=1;
		if(DB::table('admin_menu')->where('id',$id)->update($data))
		{
			return redirect('admin/menu');
		}
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('admin_menu')->whereIn('id',[$id])->delete();
		return redirect()->back();
    }
	//删除
	public function getDelete($id)
    {
		$id = explode(",",$id);	
		//p($id);		
        DB::table('admin_menu')->whereIn('id',$id)->delete();
		return redirect()->back();
    }
	//启用/禁用
	public function getJob($v,$id)
    {	
		$id = explode(",",$id);	
		//p($id);	
		$data['status']=$v;	
        DB::table('admin_menu')->whereIn('id',$id)->update($data);
		return redirect()->back();
    }
}
