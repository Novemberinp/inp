<!DOCTYPE html>
<html>
<head>
	<title>info-default</title>
</head>
<body>

{{$name}}{{$age}}

{{-- 模板中调用PHP代码 --}}
<p>{{ time() }}</p>
<p>{{ isset($val)?$val:'val' }}</p>
<p>{{ $val or 'isval' }}</p>         {{-- 等同于issset --}}

{{-- 原样输出 --}}
<p>@{{ time() }}</p>

{{-- 引入子视图  include --}}

{{--@include('welcome')  --}}{{-- 可以传值 @include('welcome'，['ms' => 12]) --}}

@if( $name == 1 )
	123
@elseif( $name == 2)
@else
	{{ $name }}
@endif

{{-- onless if 取反 --}}
@unless( $name == 'inp')
	{{ $name }}
@endunless

@for($i = 0;$i < 5;$i++)
	<p>{{ $i }}</p>
@endfor

@foreach($student as $v)
	<p>{{ $v['name'] }}</p>
@endforeach

@forelse($empty as $v)
	<p>{{ $v['name'] }}</p>
	@empty
	<p>empty</p>
@endforelse

{{-- url --}}
<a href="{{ url('member/ConnDB') }}">url()</a>
<a href="{{ action('MemberController@querySel') }}">action()</a>
<a href="{{ route('querySel') }}">route()</a>  {{-- 别名 --}}
</body>
</html>