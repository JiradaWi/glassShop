<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    @include('navbar')
    @csrf

    <div class="container">
        <br />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="card-title"> Order Number {{ $orderDetail->orderId }}</h5>
                        <h6 class="card-subtitle mb-12 text-muted">{{ $orderDetail->firstName }} {{ $orderDetail->lastName }}</h6>
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" data-bs-target="#editOrder" data-bs-toggle="modal" class="btn btn-primary">Edit</button>
                            <!-- <button type="button" class="btn btn-primary">Edit</button> -->
                        </div>

                    </div>
                </div>
                <p class="card-text">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Order Date: </label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $orderDetail->orderDate }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Order Finish Date: </label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $orderDetail->orderFinishDate }}">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-3 col-form-label"> Total Price: </label>
                            <div class="col-sm-9    ">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $orderDetail->totalPrice }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-3 col-form-label"> Payment Method: </label>
                            <div class="col-sm-9    ">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $orderDetail->paymentMethod }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Status: </label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $orderDetail->statusName }}">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Remark: </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $orderDetail->remark }}">
                            </div>
                        </div>
                    </div>
                </div>
                </p>
            </div>
        </div>

        <br />

        <!-- Order Item Card -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="card-title"> Order Item</h5>
                        <h6 class="card-subtitle mb-12 text-muted"></h6>
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" data-bs-target="#newOrderItem" data-bs-toggle="modal" class="btn btn-primary">New Order Item</button>
                            <!-- <button type="button" class="btn btn-primary">Edit</button> -->
                        </div>

                    </div>
                </div>
                <p class="card-text">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 92pt">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($orderitem) > 0)
                        @foreach ($orderitem as $item)
                        <tr>
                            <td scope="row">{{ $item->orderItemId }} </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">No order item recorded.</td>
                        </tr>
                        @endif

                    </tbody>
                </table>

                </p>
            </div>
        </div>
    </div>



    <!-- Edit Order Modal -->
    <div class="modal fade" id="editOrder" tabindex="-1" aria-labelledby="editOrder" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newCustomer">Edit Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="orderId" name="orderId" value="{{ $orderDetail->orderId }}">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">Order Date:</label>
                                <input type="text" class="form-control" id="orderDate" name="orderDate" value="{{ $orderDetail->orderDate }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Order Finish Date:</label>
                                <input type="text" class="form-control" id="orderFinishDate" name="orderFinishDate" value="{{ $orderDetail->orderFinishDate }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Payment Method:</label>
                                <input type="text" class="form-control" id="paymentMethod" name="paymentMethod" placeholder="" value="{{ $orderDetail->paymentMethod }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Status:</label>
                                <select class="form-select" id="status" name="status">
                                    @foreach ($statusName as $s)
                                    @if($s->orderStatusId == $orderDetail->status )
                                    <option value="{{ $s->orderStatusId }}" selected>{{ $s->statusName }}</option>
                                    @else
                                    <option value="{{ $s->orderStatusId }}">{{ $s->statusName }}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="contactNo" class="form-label">Remark:</label>
                                    <textarea class="form-control" id="remark" name="remark" placeholder=""> {{ $orderDetail->remark }} </textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeNewClientBtn">Close</button>
                        <button type="button" onclick="updateOrder()" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newOrderItem" tabindex="-1" aria-labelledby="newOrderItem" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newCustomer">New Order Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="orderId" name="orderId" value="{{ $orderDetail->orderId }}">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="mb-3">
                                <label for="item" class="form-label">Item:</label>
                                <select class="form-select" onchange="getPrice()" id="catalogId">
                                <option value="-">-</option>
                                @foreach($catalog as $c)
                                <option value="{{$c->itemId}}">{{$c->name}}</option>
                                @endforeach
                                </select>
                                <!-- <input type="text" class="form-control" value=""> -->
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="mb-3">
                                <label for="salesPrice" class="form-label">Sales Price:</label>
                                <input type="text" class="form-control"  value="" name="salesPrice" id="salesPrice">
                            </div>
                        </div>
                    </div>
                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeNewClientBtn">Close</button>
                        <button type="button" onclick="newOrderItem()" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <!-- <script type="text/javascript" src="{{asset('js/newOrder.js')}}"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <script type="text/javascript" src="{{asset('js/orderRecord.js')}}"></script>
</body>