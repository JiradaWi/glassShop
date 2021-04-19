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
                            <label for="orderDate" class="form-label">Start Date: </label>
                            <input type="date" class="form-control" id="orderDate">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status: </label>
                            <input type="text" class="form-control" id="status">
                        </div>
                    </div>
                </div>


                </p>
                <div style="width: 100%; text-align: right">
                    <button class="btn btn-primary" onclick="">Save</button>
                    <button class="btn btn-secondary" onclick="history.back()">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</body>