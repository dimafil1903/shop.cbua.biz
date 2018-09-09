@extends('layouts.front.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <section class="categories_banner_area">
        <div class="container">
            <div class="c_banner_inner">
                <h3>Акційні Товари</h3>
                <ul>
                    <li><a href="#">Головна</a></li>
                    <li><a href="#">Акційні Товари</a></li>

                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <!--================Categories Product Area =================-->
    <section class="no_sidebar_2column_area">
        <div class="container">
            <div class="showing_fillter">
                <div class="row m0">

                    <div class="container"><div class="row">
                            <script type="text/javascript" language="javascript">
                                fireSubmit = function(event) {
                                    document.forms["myForm"].submit();
                                }

                            </script>
                            <form name="myForm" class="form-inline" >



                                <label for="inputState" class="mr-sm-2">Сортування:</label>

                                <select name="order_by" id="inputState" class=" form-control mr-sm-4" onchange="fireSubmit(event)">
                                    <option @if(request()->input('order_by')=='updated_at') selected @endif  value="updated_at">Новинки</option>
                                    <option @if(request()->input('order_by')=='name') selected @endif  value="name">Ім'я</option>
                                    <option @if(request()->input('order_by')=='price_asc') selected @endif  value="price_asc">Від дешевих до дорогих</option>
                                    <option @if(request()->input('order_by')=='price_desc') selected @endif  value="price_desc">Від дорогих до дешевих </option>
                                </select>


                                <label for="inputState2" class="mr-sm-2">Показувати:</label>

                                <select id="inputState2" name ='show' class=" form-control mr-sm-4 " onchange="fireSubmit(event)">
                                    <option @if(request()->input('show')=='10') selected @endif  value="10">10</option>
                                    <option @if(request()->input('show')=='50') selected @endif  value="50">50</option>
                                    <option @if(request()->input('show')=='1000') selected @endif  value="100">100</option>
                                </select>




                            </form>

                            <div class="four_fillter  col-md-3 d-none d-xl-block">
                                <h4>Вигляд</h4>

                                <a href="#" class="active" id="show3"><i class="icon_grid-3x3"></i></a>
                                <a  id="show2" href="#"><i class="icon_grid-2x2"></i></a>

                            </div>
                        </div>
                    </div>
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
                </div>
            </div>
        </div>
        <div class="two_column_product">
            <div class="row">
                @include('front.products.product-list', ['products' => $products])







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
    </section>
@endsection