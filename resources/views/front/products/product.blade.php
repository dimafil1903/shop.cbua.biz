@extends('layouts.front.app')
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&autoLogAppEvents=1&version=v3.0&appId=1062102307275254';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@section('og')
    <meta property="og:type" content="product"/>
    <meta property="og:title" content="{{ $product->name }}"/>
    <meta property="og:description" content="{{ strip_tags($product->description) }}"/>
    @if(!is_null($product->cover))
        <meta property="og:image" content="{{ asset("storage/$product->cover") }}"/>
    @endif
@endsection

@section('content')

    <div class="container-fluid product">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Головна</a></li>
                    @if(isset($category))
                    <li><a href="{{ route('front.category.slug', $category->slug) }}"> / {{ $category->name }}/</a> {{$product->name}}</li>
                    @endif

                </ol>
            </div>
        </div>
        @include('layouts.front.product')
    </div>
@endsection