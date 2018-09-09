




<section class="product_details_area ">
    <div style="margin: 30px">
        <div class="row">



            <div class="col-lg-7 photo">
                <div class="product_details_slider">
                    <div id="product_slider" class="rev_slider" data-version="5.3.1.6">
                        <ul>	<!-- SLIDE  -->
                            @if(isset($product->cover))


                                    <li data-index="rs-1372214900" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="{{ asset("storage/$product->cover") }}"   data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="{{$product->name}}" data-param1="25/08/2015" data-description="" data-bgfit="contain">
                                        <!-- MAIN IMAGE -->
                                        <img  src="{{ asset("storage/$product->cover") }}"  onclick="this.classList.toggle('big')"    alt="{{$product->name}}" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina >
                                        <!-- LAYERS -->
                                    </li>
                            @else
                                <li data-index="rs-1372214900" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="{{ asset("https://placehold.it/180x180") }}"   data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Ishtar X Tussilago" data-param1="25/08/2015" data-description="" data-bgfit="contain">
                                    <!-- MAIN IMAGE -->
                                    <img  src="{{ asset("https://placehold.it/180x180") }}"  alt="{{$product->name}}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->
                                </li>
                            @endif
                            @if(isset($images) && !$images->isEmpty())
                                @foreach($images as $image)
                            <li data-index="rs-137221490{{$image->id}}" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="{{ asset("storage/$image->src") }}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Ishtar X Tussilago" data-param1="25/08/2015" data-description="">
                                <!-- MAIN IMAGE -->
                                <img  src="{{ asset("storage/$image->src") }}"  alt="{{$product->name}}"   onclick="this.classList.toggle('big')"     data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->
                            </li>
                                    @endforeach
                                        @endif
                            <!-- SLIDE  -->

                            <!-- SLIDE  -->

                            <!-- SLIDE  -->

                            <!-- SLIDE  -->

                            <!-- SLIDE  -->

                            <!-- SLIDE  -->

                            <!-- SLIDE  -->

                            <!-- SLIDE  -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 detail">
                <div class="product_details_text">
                    <h3>{{$product->name}}</h3>

                    <!--<ul class="p_rating">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                    <div class="add_review">
                        <a href="#">5 Reviews</a>
                        <a href="#">Add your review</a>
                    </div>
                    -->
                    @if($product->quantity >= 1)
                    <h6> <span>Є в наявності</span>  ({{$product->quantity}}) шт.</h6>
                    @else
                        <h6>Нема в наявності</h6>
                    @endif

                    @if (isset($product->discount))
                        <h5 class="discount" >-{{$product->discount}}%</h5>
                        <h4>{{$product->price-( $product->price * $product->discount/100)}} {{ config('cart.currency') }}</h4>
                        @else
                        <h4>{{ $product->price }} {{ config('cart.currency') }}</h4>
                    @endif


                    <p>{!! $product->description !!}</p>
                    <div class="row">
                        <div class="col-md-12">
                            @include('layouts.errors-and-messages')

                        </div>
                    </div>
                    @if(isset($productAttributes) && !$productAttributes->isEmpty())



                                @foreach($productAttributes as $productAttribute)
                                @if($productAttribute->name=='color')
                                <div class="p_color">
                                    <h4 class="p_d_title">color <span>*</span></h4>
                                    <ul class="color_list">
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                    </ul>
                                </div>
                                @endif
                                        @endforeach
                                @endif
                   <!-- <div class="p_color">
                        <h4 class="p_d_title">color <span>*</span></h4>
                        <ul class="color_list">
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="p_color">
                        <h4 class="p_d_title">size <span>*</span></h4>
                        <select class="selectpicker">
                            <option>Select your size</option>
                            <option>Select your size M</option>
                            <option>Select your size XL</option>
                        </select>
                    </div>
                    -->
                    <style>
                        input::-webkit-outer-spin-button,
                        input::-webkit-inner-spin-button {
                            /* display: none; <- Crashes Chrome on hover */
                            -webkit-appearance: none;
                            margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
                        }
                    </style>
                    <div class="quantity row">

                        <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                            {{ csrf_field() }}
                            @if(isset($productAttributes) && !$productAttributes->isEmpty())
                                <div class="form-group">
                                    <label for="productAttribute">Choose Combination</label> <br />
                                    <select name="productAttribute" id="productAttribute" class="form-control select2">
                                        @foreach($productAttributes as $productAttribute)

                                            <option value="{{ $productAttribute->id }}">
                                                @foreach($productAttribute->attributesValues as $value)
                                                    {{ $value->attribute->name }} : {{ ucwords($value->value) }}
                                                @endforeach
                                                @if(!is_null($productAttribute->price))
                                                    {{ $productAttribute->price }})    {{ config('cart.currency') }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div><hr>
                            @endif
                            <div class="form-group">
                                <div class="custom">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0  ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                    <input type="number"  class="form-control" name="quantity" id="sst"     min="1" max="{{$product->quantity}}" max="10" maxlength="12"     value="{{ old('quantity') }}"  title="Кількість:" class="input-text qty">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst < <?php echo $product->quantity; ?>) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
                                </div>

                                <input type="hidden" name="product" value="{{ $product->id }}" />
                            </div>
                            <button type="submit" class="add_cart_btn"> Додати в корзину
                            </button>


                        </form>
                        <form action="{{ route('wish.add') }}" class="form-inline" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="quantity" value="1" />
                            <input type="hidden" name="product" value="{{ $product->id }}">
                            <button  type="submit" class="add_cart_btn"><i class="icon_heart_alt"></i></button>
                        </form>
                    </div>
                    <div class="shareing_icon">
                        <h5>Поділитися: </h5>
                        <ul>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{URL::current()}}"><i class="social_facebook"></i></a></li>
                            <li><a href="https://twitter.com/share?url={{URL::current()}}&text={{$product->name}}"><i class="social_twitter"></i></a></li>
                            <li><a href="http://pinterest.com/pin/create/button/?url={{URL::current()}}&media=@if(isset($product->cover)){{ asset("storage/$product->cover")}}@endif&description={{$product->description}}"><i class="social_pinterest"></i></a></li>
                            <li><a href="https://plus.google.com/share?url={{URL::current()}}"><i class="social_googleplus"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
<div class="fb-comments" data-href="{{URL::current()}}" data-numposts="5"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('js')
    <script>

        $(".carousel_menu_inner .navbar .navbar-nav.justify-content-end li a").css( "padding", "15px 20px" );
    </script>
@endsection