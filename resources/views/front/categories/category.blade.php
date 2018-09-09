@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="category"/>
    <meta property="og:title" content="{{ $category->name }}"/>
    <meta property="og:description" content="{{ $category->description }}"/>
    @if(!is_null($category->cover))
        <meta property="og:image" content="{{ asset("storage/$category->cover") }}"/>
    @endif
@endsection

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <section class="categories_product_main p_80">
        <div class="container">
            <div class="categories_main_inner">
                <div class="row row_disable">
                    <div class="col-lg-9 float-md-right">
                        <div class="showing_fillter">
                            <div class="row m0">

                                <div class="col-md-9">

                                    <script type="text/javascript" language="javascript">
                                        fireSubmit = function(event) {
                                            document.forms["myForm"].submit();
                                        }

                                    </script>



                                    <form name="myForm" class="form-inline" >

                                        <input type="hidden" name="max_price" id="max" >
                                        <input type="hidden" name="min_price" id="min" >

                                        <label for="inputState" class="mr-sm-2">Сортування:</label>

                                        <select name="order_by" id="inputState" class=" form-control mr-sm-2" onchange="fireSubmit(event)">
                                            <option @if(request()->input('order_by')=='updated_at') selected @endif  value="updated_at">Новинки</option>
                                            <option @if(request()->input('order_by')=='name') selected @endif  value="name">Ім'я</option>
                                            <option @if(request()->input('order_by')=='price_asc') selected @endif  value="price_asc">Від дешевих до дорогих</option>
                                            <option @if(request()->input('order_by')=='price_desc') selected @endif  value="price_desc">Від дорогих до дешевих </option>
                                        </select>


                                        <label for="inputState2" class="mr-sm-2">Показувати:</label>

                                        <select id="inputState2" name ='show' class=" form-control mr-sm-2 " onchange="fireSubmit(event)">
                                            <option @if(request()->input('show')=='10') selected @endif  value="10">10</option>
                                            <option @if(request()->input('show')=='50') selected @endif  value="50">50</option>
                                            <option @if(request()->input('show')=='1000') selected @endif  value="100">100</option>
                                        </select>




                                    </form>
                                </div>
                                <div class="four_fillter  col-md-3 d-none d-xl-block">
                                    <h4>Вигляд</h4>

                                    <a href="#" class="active" id="show3"><i class="icon_grid-3x3"></i></a>
                                    <a  id="show2" href="#"><i class="icon_grid-2x2"></i></a>

                                </div>
                            </div>

                        </div>
                        <div class="categories_product_area">
                            <div class="row">
                                @if(!empty($products) && !collect($products)->isEmpty())
                                    @foreach($products as $product)
                                <div class="col-lg-6 col-xl-4 col-md-6 col-sm-6 products " id="">
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
                                                @if ($product->front_status=='bu')
                                                    <h5 class="discount">Б/У</h5>
                                                @endif
                                        </div>
                                        <div class="l_p_text" style="height: 110px">
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

@endif
                            </div>
                            @if($products instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                                <style>
                                    span a{
                                        font-size: 14px;
                                        font-family: $mon;
                                        font-weight: bold;
                                        color: #333333;
                                        border-radius: 0px !important;
                                        padding: 10px 15px;
                                        border: 1px solid transparent;

                                    }
                                    .next{
                                        background: #333333;
                                        color: #fff;
                                    }
                                    span a:hover{
                                        background: #333333;
                                        color: #fff;
                                    }

                                </style>
                                <nav aria-label="Page navigation example" class="pagination_area">
                                    <ul class="pagination">
                                        <li class="page-item">   <div class="">{{ $products->links() }}</div></li>

                                    </ul>
                                </nav>
                            @endif

                        </div>
                    </div>
                    <div class="col-lg-3 float-md-right">
                        <div class="categories_sidebar">
                            <aside class="l_widgest l_p_categories_widget">
                                <div class="l_w_title">
                                    <h3>{{ $category->name }}</h3>
                                </div>
                                @include('front.categories.sidebar-category')
                            </aside>
                            <aside class="l_widgest l_fillter_widget">
                                <div class="l_w_title">
                                    <h3>Фільтрувати за ціною</h3>
                                </div>
                                <div id="slider-range" class="ui_slider"></div>
                                <label for="amount">Ціна:</label>
                                <input type="text" id="amount" readonly>


                            </aside>

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/smoothscroll.js') }}"></script>
    <script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/magnify-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('vendors/vertical-slider/js/jQuery.verticalCarousel.js') }}"></script>
    <script src="{{ asset('vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{  asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script src="{{ asset('js/accordion-menu.js') }}"></script>

    <script>
        $( "#show2" ).click(function() {
            $( "#show2" ).addClass( "active" );
            $( "#show3" ).removeClass( "active" );
            $('.products').addClass("col-xl-6")
            $('.products').removeClass("col-xl-4")
        });
        $( "#show3" ).click(function() {
            $( "#show3" ).addClass( "active" );
            $( "#show2" ).removeClass( "active" );
            $('.products').addClass("col-xl-4")
            $('.products').removeClass("col-xl-6")
        });
    </script>
    <script>


        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 10000,
            values: [ <?php if($min!=''){echo $min;}else{ echo (0);} ?>, <?php if($max!=''){echo $max;}else{ echo (10000);} ?>],
            slide: function( event, ui ) {
                $( "#amount" ).val(  ui.values[ 0 ] + " грн  -  " + ui.values[ 1 ]  + " грн" );
                $( "#min" ).val(  ui.values[ 0 ]  );
                $( "#max" ).val(  ui.values[ 1 ]  );
            }
        });
        $( "#amount" ).val(  $( "#slider-range" ).slider( "values", 0 ) +
                " грн - " + $( "#slider-range" ).slider( "values", 1 ) +' грн' );
        $( "#min" ).val(  $( "#slider-range" ).slider( "values", 0 )  );
        $( "#max" ).val(  $( "#slider-range" ).slider( "values", 1 )  );

        $( "span.ui-state-default" )

                .mouseup(function() {
                    document.forms["myForm"].submit();
                });
    </script>

@endsection
