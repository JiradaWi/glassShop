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

                            <!-- <button type="button" data-bs-target="#editClient" data-bs-toggle="modal" class="btn btn-primary">Edit</button> -->
                            <button type="button" class="btn btn-primary">Edit</button>
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
                            <div class="col-sm-9    ">
                                <input type="text" readonly class="form-control-plaintext" value="{{ $orderDetail->statusName }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Remark: </label>
                            <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" value="{{ $orderDetail->remark }}">
                            </div>
                        </div>
                    </div>
                   
                  
                </div>
                </p>
            </div>
        </div>
    </div>

    <!-- <script type="text/javascript" src="{{asset('js/newOrder.js')}}"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>