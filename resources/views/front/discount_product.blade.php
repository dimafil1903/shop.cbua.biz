@if(!$products_action->isEmpty())
<section class="our_latest_product">
    <div class="container">
        <div class="s_m_title">
            <h2>Our Latest Product</h2>
        </div>
        <div class="l_product_slider owl-carousel">
            @foreach($products_action as $product_action)

                <div class="item">
                    <div class="l_product_item">
                        <div class="l_p_img">
                            @if (isset($product_action->cover))
                                <img class="" src="{{ asset("storage/$product_action->cover") }}" alt="dc">

                            @else
                                <img class="" src="https://placehold.it/268x330" alt="">
                            @endif
                            @if (isset($product_action->discount))
                                <h5 class="sale">-{{$product_action->discount}}%</h5>
                            @endif
                        </div>
                        <div class="l_p_text"  style="">
                            <ul>
                                <li class="p_icon"><a href="{{ route('front.get.product', str_slug($product_action->slug)) }}"><i class="icon-eye"></i></a></li>
                                <li><form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="quantity" value="1" />
                                        <input type="hidden" name="product" value="{{ $product_action->id }}">
                                        <button id="add_cart_btn" type="submit" class="btn " style="background-color: #000; border-color: #000; color: #ffffff;" data-toggle="modal" data-target="#cart-modal">Додати в корзину</button>
                                    </form>


                                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                            </ul>
                            <h4><?php echo mb_strimwidth("$product_action->name", 0, 30, "...");?> </h4>
                            @if (isset($product_action->discount))
                                <h5><del>{{ $product_action->price}} {{ config('cart.currency') }}</del>  {{$product_action->price-( $product_action->price * $product_action->discount/100)}} {{ config('cart.currency') }}</h5>
                            @else
                                <h5>@if($product_action->old_price != 0.00)<del>{{ $product_action->old_price}} {{ config('cart.currency') }}</del> @endif {{ $product_action->price}} {{ config('cart.currency') }}</h5>
                            @endif
                        </div>
                    </div>

                </div>


            @endforeach

        </div>
    </div>
</section>
    @endif