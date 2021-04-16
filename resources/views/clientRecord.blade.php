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
                <h5 class="card-title"> {{ $data->clientId }} {{ $data->firstName }} {{ $data->lastName }}</h5>
                <h6 class="card-subtitle mb-12 text-muted">{{ $data->levelName }}</h6>
                <p class="card-text">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Contact: </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $data->contactNo }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Birthdate: </label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $data->birthDate }}">
                    </div>
                </div>
                </p>
                <button type="button" onclick="editClient()" class="btn btn-primary">Edit</button>               
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{asset('js/clientRecord.js')}}"></script>
</body>

</html>