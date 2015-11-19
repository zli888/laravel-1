<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"/>
<title>用户登录</title>
<link href="/adminfiles/css/base.css" rel="stylesheet" type="text/css">
<script src="/adminfiles/js/jquery.js"></script>
</head>

<body style="background:#fff">
<div class="login">
	<div class="loginTop">
    	<p><span class="s1">ZLI管理系统</span><span class="s2"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=178417451&Menu=yes" >帮助中心</a></span></p>
    </div>
    <div class="loginForm">
        <form name="login" action="{{ action('Admin\AuthController@postLogin')}}" method="post" class="Validform">
        	{!! csrf_field() !!}        	
            <dl>
                <dt>用户登录</dt>
                <dd>
                    <input class="user" type="text" name="email" datatype="e" errormsg="邮箱不正确！"/>
                    <br>
                    <span class="Validform_checktip">输入登录邮箱</span></dd>
                <dd>
                    <input class="pw" type="password" name="password" datatype="*6-16" errormsg="密码不正确！"/>
                    <span class="Validform_checktip">输入登录密码</span></dd>                           
                <dd>
                    <input class="btn" name='' type="submit" value="登  录" style="cursor:pointer" />
                </dd>
                @if(count($errors))
                    @foreach ($errors->all() as $errors)
                        <dd><span class="Validform_checktip Validform_wrong">{{$errors}}</span></dd>
                    @endforeach
                @endif     
            </dl>
        </form>
    </div>
    <div class="loginBot">power by zli 版权所有</div>    
</div>
<script src="/adminfiles/js/Validform.js"></script> 
<script type="text/javascript">
$(function(){	
	$(".Validform").Validform({
		tiptype:4
	});
})
</script>
</body>
</html>
