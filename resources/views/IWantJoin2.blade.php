@extends('layouts.app2') @section('content')
<h1 style="background-color:#00a2ff">我要參加頁面</h1>

<p><p id="client_name">{{ $client_name }} </p>你好!!</p>
<p>您的Email : <p id="client_email">{{$client_email}}</p> 認證成功! 讓我們開始玩糞GAME吧</p>
{{ csrf_field() }}
<hr> 
{{-- 拉霸機=========== 開始--}}
    <h1>
        GG，你今天氣數已盡，不能玩了呢
    </h1>
@endsection