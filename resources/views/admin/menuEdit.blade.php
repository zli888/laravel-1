@extends('admin.layout')
@section('content')
	<div class="info">
        <div class="tit">{{isset($data) ? '编辑' : '添加'}}</div>
        <p>提示：禁止重复添加</p>
    </div>
    <div class="arcAdd mT10">
        <form name="arcform" action="{{isset($data) ? action('Admin\MenuController@update',['id'=>$data->id]) : action('Admin\MenuController@store')}}" method="post">
        	{!! isset($data) ? '<input name="_method" type="hidden" value="PATCH" >' : '' !!}
        	{!! csrf_field() !!}   
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="50">名称：</td>
                    <td><input type="text" name="name" value="{{isset($data) ? $data->name : ''}}" class="w200" /></td>
                </tr>
                <tr class="bg">
                    <td>上级：</td>
                    <td><select name="fid" id="tid">
                            
                        {!!$selectMenu!!}
                    
                        </select></td>
                </tr>
                <tr>
                    <td>排序：</td>
                    <td><input type="text" name="sort" value="{{isset($data) ? $data->sort : ''}}" class="w100" /></td>
                </tr>
                <tr class="bg">
                    <td>url：</td>
                    <td><input type="text" name="url" value="{{isset($data) ? $data->url : ''}}" class="w400" /></td>
                </tr>
                <tr class="btn">
                    <td colspan="2" style="padding:10px;"  class="tL"><input type="submit" class="coolbg" value=" 确定 " name="submit" >
                        <input type='button' class="coolbg" value=" 返回 " onclick="history.go(-1)"  ></td>
                </tr>
            </table>
        </form>
    </div>
@endsection