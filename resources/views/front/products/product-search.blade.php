@extends('layouts.front.app')

@section('content')
    <div class="container">
        <hr>
        <div class="row">
            <div class="category-top col-md-12">
                <h2>Результат пошуку:</h2>
            </div>
        </div>
        <hr>

        @if(!empty($products) && !collect($products)->isEmpty())

            <div class="row">
                @foreach($products as $product)
                    @foreach($search_products as $search_product)
                        @if($product->id == $search_product->id && $product->category == $search_product->category)
                            <div class="col-lg-6 col-xl-3  col-md-6 col-sm-6 col-xs-6 col-6">
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
                        @endif
                    @endforeach
                @endforeach

                @if($products instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">{{ $products->links() }}</div>
                        </div>
                    </div>
                @endif

                @else
                    <p class="alert alert-warning">Товари закінчилися</p>
            </div>
        @endif


        </div>

@endsection