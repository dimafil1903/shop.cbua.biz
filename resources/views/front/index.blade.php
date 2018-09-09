@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')

    @include('layouts.front.home-slider')
    <div class="home_box">
        <div class="col-md-12">@include('layouts.errors-and-messages')</div>
    <section class="home_sidebar_area">
        <div class="container">
            <div class="row row_disable">
                <div class="col-lg-9 float-md-right">
                    <div class="sidebar_main_content_area">
                        <form action="{{route('search.product')}}" class=" " method="get" id="admin-search" >
                            <div class="advanced_search_area">
                                <select name="category" id="inputState"  class="selectpicker" onchange="fireSubmit(event)">
                                    <option value="all">Всі</option>
                                    @foreach($categories as $category)
                                        <option @if(request()->input('category')=="$category->slug") selected @endif value="{{$category->slug}}"> {{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group">
                                    <input type="text" name="q" required class="form-control" placeholder="Я шукаю..." value="{!! request()->input('q') !!}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" id="search-btn" type="submit"><i class="icon-magnifier icons"></i></button>
                                        </span>
                                </div>
                            </div>
                        </form>

                        <div class="main_slider_area">
                            <div id="home_box_slider" class="rev_slider" data-version="5.3.1.6">
                                <ul>
                                    @foreach($categories as $category)
                                    <li data-index="rs-1587{{$category->id}}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="" data-param2="02" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{ asset("storage/$category->cover") }}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>

                                        <!-- LAYER NR. 1 -->
                                        <div class="slider_text_box first_text">
                                            <div class="tp-caption tp-resizeme first_text"
                                                 data-x="['left','left','left','left','left','left']"
                                                 data-hoffset="['60','60','60','60','20','0']"
                                                 data-y="['top','top','top','top','top','top']"
                                                 data-voffset="['70','70','70','70','70','70']"
                                                 data-fontsize="['48','48','48','48','48','48']"
                                                 data-lineheight="['56','56','56','56','56','48']"
                                                 data-width="['none','none','none','none','none']"
                                                 data-height="none"
                                                 data-whitespace="nowrap"
                                                 data-type="text"
                                                 data-responsive_offset="on"
                                                 data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                 data-textAlign="['left','left','left','left','left','left']"
                                            >{{$category->name}}</div>

                                            <div class="tp-caption tp-resizeme secand_text"
                                                 data-x="['left','left','left','left','left','left']"
                                                 data-hoffset="['60','60','60','60','20','0']"
                                                 data-y="['top','top','top','top']" data-voffset="['190','190','190','190','190','190']"
                                                 data-fontsize="['14','14','14','14','14','14']"
                                                 data-lineheight="['24','24','24','24','24']"
                                                 data-width="['600','600','600','600','600']"
                                                 data-height="none"
                                                 data-whitespace="normal"
                                                 data-type="text"

                                                 data-responsive_offset="on"
                                                 data-transform_idle="o:1;"
                                                 data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                 data-textAlign="['left','left','left','left','left','left']"
                                            >{{$category->description}}
                                            </div>

                                            <div class="tp-caption tp-resizeme third_btn"
                                                 data-x="['left','left','left','left','left','left']"
                                                 data-hoffset="['60','60','60','60','20','0']"
                                                 data-y="['top','top','top','top']" data-voffset="['290','290','290','290','290','290']"
                                                 data-width="none"
                                                 data-height="none"
                                                 data-whitespace="nowrap"
                                                 data-type="text"
                                                 data-responsive_offset="on"
                                                 data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                                 data-textAlign="['left','left','left','left','left','left']">
                                                <a class="checkout_btn" href="/category/{{$category->slug}}">Купити</a>
                                            </div>
                                        </div>
                                    </li>

                                        @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="promotion_area">
                            <div class="feature_inner row m0">
                                <div class="left_promotion">
                                    <div class="f_add_item">
                                        <div class="f_add_img"><img class="img-fluid" style="width:370px ; height: 220px;" src="{{ asset('img/gray.jpg')}}" alt=""></div>
                                        <div class="f_add_hover">
                                            <div class="sale">Акція</div>
                                            <h4>Акційні <br />Товари</h4>
                                            <a class="add_btn" href="{{route("front.get.action_product")}}">Купити <i class="arrow_right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="right_promotion">
                                    <div class="f_add_item right_dir">
                                        <div class="f_add_img"><img class="img-fluid" style="width:370px ; height: 220px;" src="{{ asset('img/gray.jpg')}}" alt=""></div>
                                        <div class="f_add_hover">
                                            <div class="off">Б/У</div>
                                            <h4>Б/У<br />Товари</h4>
                                            <a class="add_btn" href="{{route("front.get.bu_product")}}">Купити <i class="arrow_right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="single_c_title">
                                <h2>Рекомендації</h2>
                            </div>
                            <div class="fillter_l_p_inner">
                                <ul class="fillter_l_p">
                                    <li  data-filter=".all"><a href="#">Всі</a></li>
                                    @foreach($categories as $category)

                                        <li  data-filter=".{{$category->slug}}"><a href="#">{{$category->name}}</a></li>

                                    @endforeach
                                </ul>
                                <div class="row isotope_l_p_inner" style="position: relative; height: 859.25px;">
                                    @foreach($products as $product)
                                        <div class="col-lg-6 col-xl-4  col-md-12 col-sm-6 col-xs-6 .col-6 {{$product->categoryslug}} all" style="position: absolute; left: 0%; top: 20px;">
                                            <div class="l_product_item">
                                                <div class="l_p_img">
                                                    @if (isset($product->cover))
                                                        <img class="img-fluid" src="{{ asset("storage/$product->cover") }}" alt="dc">

                                                    @else
                                                        <img class="img-fluid" src="https://placehold.it/268x330" alt="">
                                                    @endif
                                                    @if (isset($product->discount))
                                                        <h5 class="sale">-{{$product->discount}}%</h5>
                                                    @endif
                                                </div>
                                                <div class="l_p_text "  style="">
                                                    <ul>
                                                        <li class="p_icon"><a href="{{ route('front.get.product', str_slug($product->slug)) }}"><i class="icon-eye"></i></a></li>
                                                        <li><form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="quantity" value="1" />
                                                                <input type="hidden" name="product" value="{{ $product->id }}">
                                                                <button id="add_cart_btn" type="submit" class="btn " style="background-color: #000; border-color: #000; color: #ffffff;" data-toggle="modal" data-target="#cart-modal">Додати в корзину</button>
                                                            </form>


                                                        <li class="p_icon"> <form action="{{ route('wish.add') }}" class="form-inline" method="post">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="quantity" value="1" />
                                                                <input type="hidden" name="product" value="{{ $product->id }}">
                                                                <button id="" type="submit" style="  background: transparent;  text-decoration: none;
  outline: none;  border: 1px solid #999999;
    font-size: 17px;
    color: #999999;
    display: inline-block;
    padding: 0px 10px;
    line-height: 38px;
    position: relative;
    top: 1px;" class="btn "><i class="icon_heart_alt"></i></button>
                                                            </form></li>
                                                    </ul>
                                                    <h4><?php echo mb_strimwidth("$product->name", 0, 30, "...");?> </h4>
                                                    @if (isset($product->discount))
                                                        <h5><del>{{ $product->price}} {{ config('cart.currency') }}</del>  {{$product->price-( $product->price * $product->discount/100)}} {{ config('cart.currency') }}</h5>
                                                    @else
                                                        <h5>@if($product->old_price != 0.00)<del>{{ $product->old_price}} {{ config('cart.currency') }}</del> @endif {{ $product->price}} {{ config('cart.currency') }}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                      <!--  <div class="home_sidebar_blog">
                            <h3 class="single_title">From The Blog</h3>
                            <div class="row">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="from_blog_item">
                                        <img class="img-fluid" src="img/blog/from-blog/f-blog-4.jpg" alt="">
                                        <div class="f_blog_text">
                                            <h5>fashion</h5>
                                            <p>Neque porro quisquam est qui dolorem ipsum</p>
                                            <h6>21.09.2017</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="from_blog_item">
                                        <img class="img-fluid" src="img/blog/from-blog/f-blog-5.jpg" alt="">
                                        <div class="f_blog_text">
                                            <h5>fashion</h5>
                                            <p>Neque porro quisquam est qui dolorem ipsum</p>
                                            <h6>21.09.2017</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="from_blog_item">
                                        <img class="img-fluid" src="img/blog/from-blog/f-blog-6.jpg" alt="">
                                        <div class="f_blog_text">
                                            <h5>fashion</h5>
                                            <p>Neque porro quisquam est qui dolorem ipsum</p>
                                            <h6>21.09.2017</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
                <div class="col-lg-3 float-md-right">
                    <div class="left_sidebar_area">
                        <aside class="l_widget l_categories_widget">
                            <div class="l_title">
                                <h3>Категорії</h3>
                            </div>
                            <ul>
                                @foreach($categories as $category)
                                    <li  ><a href="/category/{{$category->slug}}">{{$category->name}}</a></li>

                                @endforeach
                            </ul>
                        </aside>
                        <aside class="l_widget l_supper_widget">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-format="fluid"
                                 data-ad-layout-key="-fb+5w+4e-db+86"
                                 data-ad-client="ca-pub-4569151167229039"
                                 data-ad-slot="1130746901"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </aside>
                        @if(!$products_action->isEmpty())
                        <aside class="l_widget ">
                            <div class="f_product_left">
                                <div class="s_m_title">
                                    <h2>Акція</h2>
                                </div>
                                <div class="f_product_inner">
                                    @foreach($products_action as $product)



                                    <div class="media">
                                        <div class="d-flex">
                                            <a href="/{{$product->slug}}">
                                            @if (isset($product->cover))
                                              <img class="img-fluid" style=" max-width:100px; max-height: 100px; " src="{{ asset("storage/$product->cover") }}" alt="dc">

                                            @else
                                                <img class="img-fluid" src="{{ asset('https://placehold.it/100x100')}}" style=" max-width:100px; max-height: 100px; "  alt="">
                                            @endif
                                        </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="/{{$product->slug}}">



                                            <h4>{{$product->name}}</h4>
                                            </a>
                                            @if (isset($product->discount))
                                                <h5 class="">-{{$product->discount}}%</h5>
                                                <h5>{{$product->price-($product->price*$product->discount/100) }} {{ config('cart.currency') }}</h5>
                                            @else
                                                <h5>{{$product->price}} {{ config('cart.currency') }}</h5>
                                                @endif

                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                      </div>

                    </aside>
                        @endif
                      <!--  <aside class="l_widget l_news_widget">
                            <h3>newsletter</h3>
                            <p>Sign up for our Newsletter !</p>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="yourmail@domain.com" aria-label="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary subs_btn" type="button">Subscribe</button>
                                        </span>
                            </div>
                        </aside>
                        <aside class="l_widget l_hot_widget">
                            <h3>Summer Hot Sale</h3>
                            <p>Premium 700 Product , Titles and Content Ideas</p>
                            <a class="discover_btn" href="#">shop now</a>
                        </aside> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
   <!--  <section class="fillter_latest_product">
        <div class="container">
            <div class="single_c_title">
                <h2>Рекомендації</h2>
            </div>
            <div class="fillter_l_p_inner">
                <ul class="fillter_l_p">
                    @foreach($categories as $category)
                    <li  data-filter=".{{$category->slug}}"><a href="#">{{$category->name}}</a></li>

                        @endforeach
                </ul>
                <div class="row isotope_l_p_inner" style="position: relative; height: 859.25px;">
                    @foreach($products as $product)
                    <div class="col-lg-6 col-xl-3  col-md-6 col-sm-6 col-xs-6 .col-6 {{$product->categoryslug}}" style="position: absolute; left: 0%; top: 20px;">
                        <div class="l_product_item">
                            <div class="l_p_img">
                                @if (isset($product->cover))
                                <img class="img-fluid" src="{{ asset("storage/$product->cover") }}" alt="dc">

                                    @else
                                    <img class="img-fluid" src="https://placehold.it/268x330" alt="">
                                @endif
                                    @if (isset($product->discount))
                                    <h5 class="sale">-{{$product->discount}}%</h5>
                                        @endif
                            </div>
                            <div class="l_p_text "  style="">
                                <ul>
                                    <li class="p_icon"><a href="{{ route('front.get.product', str_slug($product->slug)) }}"><i class="icon-eye"></i></a></li>
                                    <li><form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="hidden" name="product" value="{{ $product->id }}">
                                            <button id="add_cart_btn" type="submit" class="btn " style="background-color: #000; border-color: #000; color: #ffffff;" data-toggle="modal" data-target="#cart-modal">Додати в корзину</button>
                                        </form>


                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                </ul>
                                <h4><?php echo mb_strimwidth("$product->name", 0, 30, "...");?> </h4>
                                @if (isset($product->discount))
                                <h5><del>{{ $product->price}} {{ config('cart.currency') }}</del>  {{$product->price-( $product->price * $product->discount/100)}} {{ config('cart.currency') }}</h5>
                                    @else
                                    <h5>@if($product->old_price != 0.00)<del>{{ $product->old_price}} {{ config('cart.currency') }}</del> @endif {{ $product->price}} {{ config('cart.currency') }}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
@endforeach

                </div>
            </div>
        </div>
    </section>
    @include('front.discount_product') -->
    @include('mailchimp::mailchimp')
@endsection