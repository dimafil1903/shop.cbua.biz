@extends('layouts.front.app')

@section('content')
    <!-- Main content -->
    <section class="container content">
        <div class="row">
            <div class="col-md-12">
                <h2> <i class="fa fa-home"></i> Мій профіль</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Профіль</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Закази</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> <div class="container"> <div class="profile_main">  Ім'я: {{$customer->name}} <br /><small> Email: {{$customer->email}}</div> </div></small></div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div role="tabpanel" class="tab-pane" id="orders">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">дата</th>
                                        <th scope="col">Спосіб доставки</th>
                                        <th scope="col">Всього</th>
                                        <th scope="col">Статус</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <a data-toggle="modal" data-target="#order_modal_{{$order['id']}}" title="Show order" href="javascript: void(0)">{{ date('Y-m-d H:i:s', strtotime($order['created_at'])) }}</a>
                                                <!-- Button trigger modal -->
                                                <!-- Modal -->
                                                <div class="modal fade" id="order_modal_{{$order['id']}}" tabindex="-1" role="dialog" aria-labelledby="MyOrders">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table">
                                                                    <thead>

                                                                    <th>Назва</th>
                                                                    <th>Ціна</th>
                                                                    <th>Кількість</th>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($products_order as $product_order)
                                                                    <tr>

                                                                        @if($order['id'] == $product_order->order_id)
                                                                        <td>{{$product_order->name}}</td>
                                                                        @if (isset($product_order->discount))
                                                                            <td>  {{$product_order->price-( $product_order->price * $product_order->discount/100)}} {{ config('cart.currency') }}</td>
                                                                        @else
                                                                            <td>{{$product_order->price}} {{ config('cart.currency') }}</td>
                                                                        @endif
                                                                        <td>{{$product_order->qty}}</td>
                                                                        @endif
                                                                    </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td><span class="label">@foreach($couriers as $courier) @if($order['courier_id']==$courier->id) {{$courier->name}} @endif @endforeach</span></td>


                                            <td><span class="label @if($order['total'] != $order['total_paid']) label-danger @else label-success @endif"> {{ $order['total'] }} {{ config('cart.currency') }}</span></td>
                                            <td><p class="text-center" style="color: #ffffff; background-color: {{ $order['status']->color }}">{{ $order['status']->name }}</p></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <style>
                                    .page-item .page-link{
                                        color:#fff;
                                        background-color: #000000;
                                        font-size: 14px;
                                        font-family: "Montserrat", sans-serif;
                                        font-weight: bold;
                                        padding: 10px 15px;
                                        border: 1px solid #000;
                                    }
                                </style>
                                {{ $orders->links() }}
                            </div></div>

                    </div>

                    <!-- Tab panes -->


                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
