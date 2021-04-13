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
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Search Customer:</label>
            <input type="text" class="form-control" aria-describedby="searchHelp" onkeyup="searchCustomer(event)" name="searchKeyword">
            <div id="searchHelp" class="form-text">Search by firstname, lastname or mobile number.</div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Contact No.</th>
                    <th scope="col">Customer Level</th>
                </tr>
            </thead>
            <tbody id="clientInformation">
                @foreach ($data as $d)
                <tr>
                    <td>{{ $d->clientId}}</td>
                    <td> {{ $d->firstName }}</td>
                    <td> {{ $d->lastName }}</td>
                    <td> {{ $d->contactNo }}</td>
                    <td> {{ $d->levelName }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
</body>

</html>