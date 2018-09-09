@extends('layouts.front.app')

@section('content')
    <link rel='stylesheet' href='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Map/styles/map.css' />
    <link rel='stylesheet' href='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Map/styles/map.css' />
    <div class="container product-in-cart-list">
        @if(!$cartItems->isEmpty())
            <div class="row">

                <div class="col-md-12 content">
                    <div class="box-body">
                        @include('layouts.errors-and-messages')
                        <section class="shopping_cart_area p_100">
                            <form action="{{route('checkout.execute')}}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="billing_details">
                                            <h2 class="reg_title">Форма оформлення</h2>


                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="name">Ім'я<span>*</span></label>
                                                        <input type="text" class="form-control"  required name="name_user" id="name" aria-describedby="name" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="last">Прізвище <span>*</span></label>
                                                        <input type="text" class="form-control" required name="last_name" id="last" aria-describedby="last">
                                                    </div>
                                                </div>
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="inputGroupSelect01">Спосіб одержання <span>*</span></label>
                                                    <select class="custom-select form-control" name="courier_id" id="select">
                                                        <option value="3"> Нова пошта </option>
                                                        <option value="4">Укрпошта</option>
                                                        <option value="5">Самовивіз</option>
                                                    </select>
                                                </div>
                                                <input id="input" type="text" name="input" style="display:none">
                                                </div>
                                            </div>
                                        <div class="col-lg-12 " id="button_nova_poshta">
                                            <div class="form-group">
                                        <div id="np-map"  style="margin-top: 10px" > <button type="button"  id="npw-map-open-button">НАЙБЛИЖЧЕ ВІДДІЛЕННЯ</button> <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPhm7Q29X5ldwjLtA7IMYHU_0xATiWK3A&amp;language=ru"></script> </div>

                                            </div>
                                            </div>
                                        <div class="col-lg-12" id="input_nova_poshta">
                                                   <div class="form-group">
                                                        <label for="address">№ Відділення нової почти <span>*</span>
                                                        </label>
                                                        <input type="text" class="form-control" name="number_nova_poshta"  id="numbernovaposhta" aria-describedby="numbernovaposhta">
                                                    </div>
                                                </div>
                                        <div class="col-lg-12" id="input_index">
                                            <div class="form-group">
                                                <label for="index">Індекс <span>*</span>
                                                </label>
                                                <input type="text" class="form-control" name="index"  id="index" aria-describedby="index">
                                            </div>
                                        </div>




                                                <div class="col-lg-12" style="margin-top: 5px">
                                                    <div class="form-group">
                                                        <label for="ctown">Місто<span>*</span></label>
                                                        <input type="text" class="form-control" name="city" required id="city" aria-describedby="city">
                                                    </div>
                                                </div>


                                                <div class="col-lg-12">
                                                    <label for="phone">Номер телефону <span>*</span></label>
                                                    <div class="form-group">
                                                    <div class="input-group">


                                                        <span class="input-group-addon" id="380">+380</span>
                                                        <input type="tel" class="form-control" name="phone" required id="phone"  pattern="[0-9]{9}" aria-describedby="380">
                                                    </div>

                                                </div>
                                                </div>

                                            <div>
                                                <button type="submit" value="submit" class="btn subs_btn form-control">Зробити замовленяя</button>
                                            </div>





                                        </div>
                                    <script type="text/javascript">
                                        $("#select").on('change', function(){
                                            if($(this).val() == 3){
                                                $("#button_nova_poshta").show();
                                                $("#input_nova_poshta").show();
                                            } else {
                                                $("#button_nova_poshta").hide();
                                                $("#input_nova_poshta").hide();
                                            }
                                        })
                                    </script>

                                    <div class="col-lg-4">
                                        <div class="order_box_price">
                                            <h2 class="reg_title">Ваш список товарів</h2>
                                            <div class="payment_list">
                                                <div class="price_single_cost">
                                                    <?php $preprice=0?>
                                                    <?php $allqty=0;$onetotal=0;$pretotal=0;?>
                                                    @foreach($cartItems as $cartItem)
                                                        <div class="row" style="border-bottom: 1px solid #bdbdbd;"><h5 class="col-md-7">{{$cartItem->product->name }}</h5> <span class="col-md-5">      @if (isset($cartItem->product->discount))

                                                                    <?php $preprice= $cartItem->product->price-($cartItem->product->price * $cartItem->product->discount/100);$allqty += $cartItem->qty; $pretotal+= $preprice* $cartItem->qty?>
                                                                    {{($cartItem->product->price-($cartItem->product->price * $cartItem->product->discount/100))*$cartItem->qty }}

                                                                @else

                                                                    <?php $preprice= $cartItem->product->price; $pretotal+= $preprice* $cartItem->qty; $allqty+=$cartItem->qty?>
                                                                    {{ $cartItem->product->price*$cartItem->qty  }}
                                                                @endif  {{ config('cart.currency') }} за {{$cartItem->qty}} шт.</span> </div>

                                                    @endforeach

                                                    <h3><span class="normal_text">Всього:</span> <span>{{$pretotal}} {{ config('cart.currency') }}</span></h3>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                                <input type="hidden" name="allqty" value="{{$allqty}}">
                                <input type="hidden" name="pretotal" value="{{$pretotal}}">

                            </form>
                        </section>
                        <script type='text/javascript' id='map' charset='utf-8' data-lang='ua' apiKey='dc861f59264e5fc5e6a2242fc8f03b2a' data-town='undefined' data-town-name='undefined' data-town-id='undefined' src='https://apimgmtstorelinmtekiynqw.blob.core.windows.net/content/MediaLibrary/Widget/Map/dist/map.min.js'></script>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="alert alert-warning">Корзина пуста. <a href="{{ route('home') }}">Але її можна поповнити!</a></p>
                                </div>
                            </div>
                        @endif
                    </div>



                    <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
                    <script>
                        fireSubmit = function(event) {
                            document.forms["myForm"].submit();
                        };


                    </script>
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

@endsection
