@extends('layouts.front.app')

@section('content')

            @if(!$cartItems->isEmpty())
                <section class="solid_banner_area">
                    <div class="container">
                        <div class="solid_banner_inner">
                            <h3>Список бажань</h3>
                            <ul>
                                <li><a href="/">Головна</a></li>
                                <li><a href="/wish">Список бажань</a></li>
                            </ul>
                        </div>
                    </div>
                </section>

                        <div class="box_body">
                            @include('layouts.errors-and-messages')
                            <section class="shopping_cart_area p_100">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cart_items">
                                                <h3>Ваш список</h3>
                                                <div class="table-responsive-md">
                                                    <table class="table">
                                                        <tbody>
                                                        <?php $preprice=0?>
                                                        <?php $qty=0;$onetotal=0;$pretotal=0;?>

                                                        @foreach($cartItems as $cartItem)
                                                            <tr>
                                                                <th scope="row">


                                                                    <form name="myForm" action="{{ route('wish.delete')}}" method="post">
                                                                        {{ csrf_field() }}
                                                                        <input  type="hidden" name="delete" value="{{$cartItem->id}}">

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
                                                                            <a href=" {{ route('front.get.product', [$cartItem->slug]) }}">
                                                                                <h4>{{ $cartItem->name }}</h4>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>

                                                                    <p class="red" id="price_{{$cartItem->id}}">

                                                                        @if (isset($cartItem->discount))

                                                                            <?php $preprice= $cartItem->price-($cartItem->price * $cartItem->discount/100); $pretotal+= $preprice* $cartItem->quantity?>
                                                                            {{$cartItem->price-($cartItem->price * $cartItem->discount/100)}}

                                                                        @else

                                                                            <?php $preprice= $cartItem->price; $pretotal+= $preprice* $cartItem->quantity?>
                                                                            {{ $cartItem->price }}
                                                                        @endif  {{ config('cart.currency') }}</p>


                                                                </td>

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


                                    </div>
                                </div>
                            </section>
                            <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
                            <script>
                                fireSubmit = function(event) {
                                    document.forms["myForm"].submit();
                                };
                                $(document).ready(function() {

                                    $( "#{{$cartItem->slug}} input" )
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
                                        <p class="alert alert-warning">Список бажань пустий. </p>
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