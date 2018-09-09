@extends('layouts.front.app')

@section('content')
    <hr>
    <!-- Main content -->
    <section class="login_area p_100">
        <div class="container">
            <div class="login_inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-12">@include('layouts.errors-and-messages')</div>
                        <div class="login_title">
                            <h2>Увідіть до аккаунту</h2>
                            <p>Увійдіть до свого аккаунту,щоб почати купувати товари</p>
                        </div>
                        <form class="login_form row" action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-lg-12 form-group">
                                <input type="email" id="email" placeholder="Email" name="email" value="{{ old('email') }}" class="form-control"  autofocus>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="password" name="password" id="password" value="" placeholder="Пароль" class="form-control" >
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="creat_account">
                                    Увійти за допомогою: <a href="{{url('login/facebook')}}"><i class="social_facebook"></i></a>
                                </div>
                                <h4> <a href="{{route('password.request')}}">Забули пароль? </a>  <a href="{{route('register')}}" class="text-center">Зареєструватися</a></h4>
                            </div>
                            <div class="col-lg-12 form-group">
                                <button type="submit" value="submit" class="btn update_btn form-control">Увійти</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- /.content -->
@endsection
