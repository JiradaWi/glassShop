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
                            New Eye Sight for <b>{{ $data->firstName }} {{ $data->lastName }} </b>
                        </h5>

                    </div>

                </div>
                <p class="card-text">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="leftEye" class="form-label">Left Eye</label>
                            <input type="text" class="form-control" id="leftEye">
                        </div>

                    </div>


                    <div class="col-6">
                        <div class="mb-3">
                            <label for="rightEye" class="form-label">Right Eye</label>
                            <input type="text" class="form-control" id="rightEye">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="remark" class="form-label">Remark</label>

                            <textarea class="form-control" id="remark" rows="3"></textarea>

                        </div>
                    </div>
                </div>

                </p>
                <button class="btn btn-primary">Save</button>
                <button  class="btn btn-secondary" onclick="history.back()">Cancel</button>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
</body>

</html>