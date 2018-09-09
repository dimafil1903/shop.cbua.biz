<div class="container product-in-cart-list">
    @if(!$cartItems->isEmpty())
        <div class="row">

            <div class="col-md-12 content">
                <div class="box-body">
                    @include('layouts.errors-and-messages')
                    <section class="shopping_cart_area p_100">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="billing_details">
                                        <h2 class="reg_title">Billing Detail</h2>
                                        <form class="billing_inner row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="cun">Country <span>*</span></label>
                                                    <div class="btn-group bootstrap-select"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" data-id="cun" title="United State America (USA)"><span class="filter-option pull-left">United State America (USA)</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">United State America (USA)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Bangladesh (BAN)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">United State America (USA)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker" id="cun" tabindex="-98">
                                                            <option>United State America (USA)</option>
                                                            <option>Bangladesh (BAN)</option>
                                                            <option>United State America (USA)</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="name">First Name <span>*</span></label>
                                                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="last">Last Name <span>*</span></label>
                                                    <input type="text" class="form-control" id="last" aria-describedby="last">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="cname">Company Name <span>*</span></label>
                                                    <div class="btn-group bootstrap-select"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" data-id="cname" title="United State America (USA)"><span class="filter-option pull-left">United State America (USA)</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">United State America (USA)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Bangladesh (BAN)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">United State America (USA)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker" id="cname" tabindex="-98">
                                                            <option>United State America (USA)</option>
                                                            <option>Bangladesh (BAN)</option>
                                                            <option>United State America (USA)</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="address">Address <span>*</span></label>
                                                    <input type="text" class="form-control" id="address" aria-describedby="address">
                                                    <input type="text" class="form-control" id="address2" aria-describedby="address">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="ctown">City / Town <span>*</span></label>
                                                    <div class="btn-group bootstrap-select dropup"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" data-id="ctown" title="United State America (USA)" aria-expanded="false"><span class="filter-option pull-left">United State America (USA)</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox" x-placement="top-start" style="max-height: 797px; overflow: hidden; min-height: 0px; position: absolute; transform: translate3d(0px, 0px, 0px); top: 0px; left: 0px; will-change: transform;"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false" style="max-height: 779px; overflow-y: auto; min-height: 0px;"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">United State America (USA)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Bangladesh (BAN)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">United State America (USA)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker" id="ctown" tabindex="-98">
                                                            <option>United State America (USA)</option>
                                                            <option>Bangladesh (BAN)</option>
                                                            <option>United State America (USA)</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="email">Email <span>*</span></label>
                                                    <input type="email" class="form-control" id="email" aria-describedby="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone <span>*</span></label>
                                                    <input type="text" class="form-control" id="phone" aria-describedby="phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="creat_account">
                                                        <input type="checkbox" id="f-option" name="selector">
                                                        <label for="f-option">Ship to a different address?</label>
                                                        <div class="check"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="cunt">Country <span>*</span></label>
                                                    <div class="btn-group bootstrap-select"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" data-id="cunt" title="United State America (USA)"><span class="filter-option pull-left">United State America (USA)</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">United State America (USA)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Bangladesh (BAN)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">United State America (USA)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker" id="cunt" tabindex="-98">
                                                            <option>United State America (USA)</option>
                                                            <option>Bangladesh (BAN)</option>
                                                            <option>United State America (USA)</option>
                                                        </select></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="name2">First Name <span>*</span></label>
                                                    <input type="text" class="form-control" id="name2" aria-describedby="name2" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="last2">Last Name <span>*</span></label>
                                                    <input type="text" class="form-control" id="last2" aria-describedby="last2">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="company">Company Name <span>*</span></label>
                                                    <input type="text" class="form-control" id="company" aria-describedby="company">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="city">City / Town <span>*</span></label>
                                                    <input type="text" class="form-control" id="city" aria-describedby="city">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="order">Order Notes <span>*</span></label>
                                                    <textarea class="form-control" id="order" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>

                                <div class="col-lg-4">
                                    <div class="order_box_price">
                                        <h2 class="reg_title">Your Order</h2>
                                        <div class="payment_list">
                                            <div class="price_single_cost">
                                                @foreach($cartItems as $cartItem)
                                                <div class="row" style="border-bottom: 1px solid #bdbdbd;"><h5 class="col-md-7">{{$cartItem->product->name }}</h5> <span class="col-md-5"> <?php  $price=$cartItem->product->price ;$qauntity=$cartItem->qty;      echo((double)$price*(int)$qauntity)  ?> {{ config('cart.currency') }} за {{$cartItem->qty}} шт.</span> </div>

                                                @endforeach
                                                <h4 >Cart Subtotal <span>{{$subtotal}} {{ config('cart.currency') }} </span></h4>
                                                <h3><span class="normal_text">Order Totals</span> <span>$50.00</span></h3>
                                            </div>
                                            <div id="np-map"> <button type="button" id="npw-map-open-button">НАЙБЛИЖЧЕ ВІДДІЛЕННЯ</button> <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPhm7Q29X5ldwjLtA7IMYHU_0xATiWK3A&amp;language=ru"></script> </div>
                                            <button type="submit" value="submit" class="btn subs_btn form-control">place order</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
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