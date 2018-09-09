@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->

        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-6">
                        <h2>
                            <a href="{{ route('admin.customers.show', $customer->id) }}">{{$customer->name}}</a> <br />
                            <small>{{$customer->email}}</small> <br />

                        </h2>
                    </div>
                    <div class="col-md-3 col-md-offset-3">
                        <h2><a href="{{route('admin.orders.invoice.generate', $order['id'])}}" class="btn btn-primary btn-block">Download Invoice</a></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-body">
                <h4> <i class="fa fa-shopping-bag"></i> Order Information</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <td class="col">Date</td>
                            <td class="col">Customer</td>
                            <td class="col">Ім'я</td>
                            <td class="col">Прізвище</td>
                            <td class="col">Місто</td>
                            <td class="col">Phone</td>
                            <td class="col">index</td>
                            @if(isset($order['number_nova_poshta']))
                            <td class="col">№ Нової Пошти</td>
                            @endif

                            <td class="col">Status</td>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a data-toggle="modal" data-target="#order_modal_{{$order['id']}}" title="Show order" href="javascript: void(0)">{{ date('Y-m-d H:i:s', strtotime($order['created_at'])) }}</a>
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
                            </div></td>
                        <td><a href="{{ route('admin.customers.show', $customer->id) }}">{{ $customer->name }}</a></td>
                        <td class="">{{ $order['name_user'] }}</td>
                        <td class="">{{ $order['last_name_user'] }}</td>

                        <td><strong>{{$order['city']}}</strong></td>
                        <td class="">{{ $order['phone'] }}</td>
                        <td class="">{{ $order['index_city'] }}</td>
                        @if(isset($order['number_nova_poshta']))
                        <td class="">{{ $order['number_nova_poshta'] }}</td>
                        @endif

                        <td>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <form method="get" action="/admin/orders/{{$order["id"]}}/" name="myForm">



                            <select name="id" class="form-control form-control-sm">



                                    {{ $currentStatus->name }}


                                    @foreach($order_statuses as $order_status)
                                    <option class="dropdown-item"  @if($currentStatus->id==$order_status->id) selected @endif  value="{{$order_status->id}}" id="val{{$order_status->id}}" >{{$order_status->name}}</option>

                                    @endforeach

                            </select>
                                <input type="submit" value="оновити">
                            </form>

                          </td>

                    </tr>
                    </tbody>
                    <tbody>
                    <tr>

                        <td class="bg-warning">Загальна кількість</td>
                        <td class="bg-warning">{{ $order['total_products'] }}</td>
                    </tr>

                    <tr>


                    </tr>
                    <tr>

                        <td class="bg-success text-bold">Сумма заказу</td>
                        <td class="bg-success text-bold">{{ $order['total'] }}</td>
                    </tr>
                    @if($order['total_paid'] != $order['total'])
                        <tr>
                            <td></td>
                            <td></td>

                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>





    </section>
    <!-- /.content -->
@endsection