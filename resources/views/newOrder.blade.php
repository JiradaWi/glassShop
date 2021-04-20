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

        <form action="/saveOrder" method="post">
        {{ csrf_field() }}
            <input type="hidden" class="form-control" value="{{ $data->clientId }}" name="clientId">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title">
                                New Order for <b>{{ $data->firstName }} {{ $data->lastName }} </b>
                            </h5>
                        </div>
                    </div>
                    <p class="card-text">
                        <input type="hidden" value="{{ $data->clientId }}" id="clientId" />
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="orderDate" class="form-label">Order Date: </label>
                                <input type="date" class="form-control" id="orderDate" name="orderDate">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status: </label>
                                <select class="form-select" id="status" name="status">
                                    @foreach ($status as $s)
                                    <option value="{{ $s->orderStatusId }}">{{ $s->statusName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="remark" class="form-label">Remark: </label>
                                <textarea class="form-control" id="remark" name="remark"></textarea>
                            </div>
                        </div>
                    </div>

                    </p>
                    <div style="width: 100%; text-align: right">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-secondary" onclick="history.back()">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- <script type="text/javascript" src="{{asset('js/newOrder.js')}}"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>