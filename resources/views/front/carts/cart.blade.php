@extends('layouts.front.app')

@section('content')

            @if(!$cartItems->isEmpty())
                <section class="solid_banner_area">
                    <div class="container">
                        <div class="solid_banner_inner">
                            <h3>Корзина</h3>
                            <ul>
                                <li><a href="/">Головна</a></li>
                                <li><a href="/cart">Корзина</a></li>
                            </ul>
                        </div>
                    </div>
                </section>

                        <div class="box_body">
                            @include('layouts.errors-and-messages')
                            <section class="shopping_cart_area p_100">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="cart_items">
                                                <h3>Ваші товари в корзині</h3>
                                                <div class="table-responsive-md">
                                                    <table class="table">
                                                        <tbody>
                                                        <?php $preprice=0?>
                                                        <?php $qty=0;$onetotal=0;$pretotal=0;?>

                                                        @foreach($cartItems as $cartItem)
                                                            <tr>
                                                                <th scope="row">


                                                                    <form name="myForm" action="{{ route('cart.destroy', $cartItem->rowId) }}" method="post">
                                                                        {{ csrf_field() }}
                                                                        <input  type="hidden" name="_method" value="delete">

                                                                        <img onclick="fireSubmit(event)" src="{{ asset('img/icon/close-icon.png')}}" alt="">

                                                                    </form>

                                                                </th>
                                                                <td>
                                                                    <div class="media">

                                                                        <div class="d-flex">

                                                                            @if(isset($cartItem->cover))
                                                                                <img src="{{ asset("storage/$cartItem->cover") }}" alt="{{ $cartItem->name }}" style="width:150px;height: 123px;">
                                                                            @else
                                                                                <img src="{{asset('https://placehold.it/120x120')}}" alt="" style="width:102px;height: 123px;">
                                                                            @endif

                                                                        </div>
                                                                        <div class="media-body">
                                                                            <a href=" {{ route('front.get.product', [$cartItem->product->slug]) }}">
                                                                                <h4>{{ $cartItem->name }}</h4>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>

                                                                    <p class="red" id="price_{{$cartItem->product->id}}">

                                                                        @if (isset($cartItem->product->discount))

                                                                            <?php $preprice= $cartItem->product->price-($cartItem->product->price * $cartItem->product->discount/100); $pretotal+= $preprice* $cartItem->qty?>
                                                                            {{$cartItem->product->price-($cartItem->product->price * $cartItem->product->discount/100)}}

                                                                        @else

                                                                            <?php $preprice= $cartItem->product->price; $pretotal+= $preprice* $cartItem->qty?>
                                                                            {{ $cartItem->product->price }}
                                                                        @endif  {{ config('cart.currency') }}</p>


                                                                </td>
                                                                <form action="{{ route('cart.update', $cartItem->rowId) }}" class="form-inline" method="post">
                                                                    <td style="    width: 25%;">

                                                                        <div class="quantity" >
                                                                            <h6 >Кількість:</h6>

                                                                            <div class="custom" >

                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="_method" value="put">





                                                                                <button onclick="var result = document.getElementById('{{$cartItem->product->slug}}'); var sst = result.value;  if( !isNaN( sst ) &amp;&amp; sst > 1  ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                                                                <input type="number"  min="1" max="{{$cartItem->product->quantity}}" name="quantity" id='{{$cartItem->product->slug}}' maxlength="12" value="{{ $cartItem->qty }}" title="Кількість:" required class="input-text qty">
                                                                                <button onclick="var result = document.getElementById('{{$cartItem->product->slug}}'); var sst = result.value; if( !isNaN( sst ) && sst < <?php echo $cartItem->product->quantity; ?>) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>





                                                                            </div>


                                                                        </div>


                                                                    </td>
                                                                    <td >         <div style="float: left;">   <button class="btn btn-default">Оновити</button> </div></td>

                                                                </form>
                                                            </tr>
                                                        @endforeach

                                                        <tr>
                                                            <th scope="row">
                                                            </th>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="cart_totals_area">
                                                <h4>Сумма товарів</h4>
                                                <div class="cart_t_list">



                                                </div>
                                                <div class="total_amount row m0 row_disable">
                                                    <div class="float-left">
                                                        Всього
                                                    </div>
                                                    <div class="float-right">
                                                        <p id="subtotal"> {{ $total=$pretotal }} {{config('cart.currency')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <form method="get" action="{{route('checkout.store')}}">
                                                <button type="submit"  class="btn subs_btn form-control">Перейти до оформлення</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </section>
                            <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
                            <script>
                                fireSubmit = function(event) {
                                    document.forms["myForm"].submit();
                                };
                                $(document).ready(function() {

                                    $( "#{{$cartItem->product->slug}} input" )
                                            .keyup(function() {
                                                var quantity = $(this).val();
                                                var price = 5;
                                                var total= quantity *price;
                                                $('#total').innerHTML;
                                            })


                                            .keyup();
                                });

                            </script>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="alert alert-warning">Корзина пуста. <a href="{{ route('home') }}">Але її можна поповнити!</a></p>
                                    </div>
                                </div>
                            @endif
        </div>





@endsection
@section('css')
    <style type="text/css">
        .product-description {
            padding: 10px 0;
        }
        .product-description p {
            line-height: 18px;
            font-size: 14px;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
        }
    </style>

@endsection