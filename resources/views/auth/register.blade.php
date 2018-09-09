@extends('layouts.front.app')

@section('content')

<div class="col-lg-12">
    @if (session()->has('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif
    <div class="login_title">
        <h2>Створити аккаунт</h2>
        <p>Ви можете створити аккаунт,щоб почати купувати товари</p>
    </div>
    <form class="login_form row"  method="POST" action="{{ route('register') }}" >
        {{ csrf_field() }}
        <div class="col-lg-12 form-group {{ $errors->has('name') ? ' has-error' : '' }}" >
            <input id="name" type="text" class="form-control" name="name" placeholder="Ім'я" value="{{ old('name') }}" autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="col-lg-12 form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>

        <div class="col-lg-12 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" placeholder="Пароль" name="password">
            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="col-lg-12 form-group">
            <input id="password-confirm" type="password" class="form-control" placeholder="Підтвердіть пароль" name="password_confirmation">
        </div>
        <div class="col-lg-12 form-group">
            <button type="submit" value="submit" class="btn subs_btn form-control">Зареєструватися</button>
        </div>
    </form>
</div>
@endsection

