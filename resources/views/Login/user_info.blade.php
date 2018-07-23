


@extends('layouts.app')

@section('content')
<h1 style="background-color:#00a2ff">這是Email登入頁面，登入完才能玩糞Game</h1>


  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">驗證Email </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('LoginEmail') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">請輸入Email:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">請輸入姓名:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   登入
                                </button>
                                <a href="https://www.google.com.tw/search?q=%E6%B2%92%E6%9C%89%E5%B8%B3%E8%99%9F%3F%E7%8E%A9%E4%B8%89%E5%B0%8F%E9%81%8A%E6%88%B2&oq=%E6%B2%92%E6%9C%89%E5%B8%B3%E8%99%9F%3F%E7%8E%A9%E4%B8%89%E5%B0%8F%E9%81%8A%E6%88%B2&aqs=chrome..69i57j69i58.10973j0j7&sourceid=chrome&ie=UTF-8" target="_blank">沒有帳號?註冊帳號</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
