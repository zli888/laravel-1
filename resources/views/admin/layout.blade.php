<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;"/>
<title>管理后台</title>
<link href="/adminfiles/css/base.css" rel="stylesheet" type="text/css">
<script src="/adminfiles/js/jquery.js"></script>
<script src="/adminfiles/js/effect.js"></script>
@yield('head')
</head>

<body>
<div class="header"> <a href="" class="logo fL"></a><a href="" class="fL">ZLICMS管理控制台</a>
    <div class="user"> 您好！{{$user->email}}  |  <a href="{{ action('Admin\AuthController@getLogout')}}">退出</a></div>
</div>
<div class="nav">	          
    @foreach ($menu as $m)                    
        <h3><em></em>{{$m['name']}}</h3>
        <ul>
            @foreach ($m["son"] as $s)                    
            <li><a href="{{ url($s['url']) }}">{{$s['name']}}</a></li>
            @endforeach
        </ul>
    @endforeach   
</div>
<script type="text/javascript">
	var ary = location.href.split("&");
	jQuery(".nav").slide({titCell:"h3", targetCell:"ul",defaultIndex:1,effect:"slideDown",delayTime:300,trigger:"click",defaultPlay:false});
</script>
<div class="main">
    @yield('content')
</div>
</body>
</html>