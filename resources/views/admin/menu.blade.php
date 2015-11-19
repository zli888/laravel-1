@extends('admin.layout')
@section('head')
<script src="/adminfiles/js/base.js"></script>
<script language="javascript">
// 删除
function delCheckboxForm()
{
	var qstr=getCheckboxItem();
	if(qstr=="") alert("你没选中任何内容！");
	else if(window.confirm('你确定要删除吗?')) location.href="{{ action('Admin\MenuController@getDelete') }}/"+qstr;
}                                                           
// 禁用
function disableCheckboxForm()
{
	var qstr=getCheckboxItem();
	if(qstr=="") alert("你没选中任何内容！");
	else location.href="{{ action('Admin\MenuController@getJob',['v'=>0]) }}/"+qstr;
}
// 启用
function passCheckboxForm()
{
	var qstr=getCheckboxItem();
	if(qstr=="") alert("你没选中任何内容！");
	else location.href="{{ action('Admin\MenuController@getJob',['v'=>1]) }}/"+qstr;
}
</script>
@endsection
@section('content')
<div class="info">
        <div class="tit">后台菜单<a class="add" href="{{action('Admin\MenuController@create')}}"> 添加 </a></div>
        <p>提示：禁止重复添加</p>
    </div>
    <div class="list mT10">
    <form name="CheckboxForm" action="" method="post">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr class="tit2 bg">
                <td  width="10%">ID</td>
                <td  width="10%">选择</td>
                <td  width="10%">排序</td>
                <td  width="20%">名称</td>
                <td  width="30%">url</td>
                <td  width="10%">状态</td>
                <td  width="10%">操作</td>
            </tr>   
            @foreach ($data as $v)
            <tr onmousemove="javascript:this.bgColor='#d2e8fb';" onmouseout="javascript:this.bgColor='';">
                <td>{{$v['id']}}</td>
                <td><input name="id" type="checkbox" id="aid" value="{{$v['id']}}"></td>
                <td>{{$v['sort']}}</td>
                <td class="tL">{{$v['level']>1 ? '└' : ''}}{{$v['html']}}{{$v['name']}}</td>
                <td class="tL">{{$v['url']}}</td> 
                <td>{!! $v['status'] ? '启用' :'<font color="#FF0000">禁用</font>' !!}</td> 
                <td align="center">                    
                    <a class="edit" href="{{ action('Admin\MenuController@edit', ['id' => $v['id']]) }}"></a>
                    <a class="del" href="{{ action('Admin\MenuController@getDelete', ['id' => $v['id']]) }}" onclick="return confirm('确实要删除吗？')"></a>
                </td>              
            </tr>
            @endforeach  
            <tr>
                <td colspan="9" class="pagelist"></td>
            </tr>
            <tr>
                <td colspan="9" class="tit"><input type='button' class="coolbg"  value='全选' onClick="selAll()" />
                    <input type='button' class="coolbg"  value='取消' onClick="selNone()" />
                    <input type='button' class="coolbg"  value='反选' onClick="selNor()"  />
                    <input type='button' class="coolbg"  value=' 删除 ' onClick="delCheckboxForm()" />
                    <input type='button' class="coolbg"  value=' 启用 ' onClick="passCheckboxForm()" />
                    <input type='button' class="coolbg"  value=' 禁用 ' onClick="disableCheckboxForm()" /></td>
            </tr>
        </table>
    </form> 
    </div> 
@endsection