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
        <div id="addClientAlert" style="display: none">
            <div class="alert alert-success" role="alert">
                Client created!
            </div>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-10">
                    <label for="searchCustomer" class="form-label">Search Customer:</label>
                    <input id="searchCustomer" type="text" class="form-control" aria-describedby="searchHelp" onkeyup="searchCustomer(event)" name="searchKeyword">
                    <div id="searchHelp" class="form-text">Search by firstname, lastname or mobile number.</div>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-primary" style="margin-top:16%" data-bs-toggle="modal" data-bs-target="#newCustomerModal">New Customer</button>
                </div>

            </div>
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
                <tr onclick="window.location = '/client/{{$d->clientId}}'" >
                    <td> {{ $d->clientId }} </td>
                    <td> {{ $d->firstName }} </td>
                    <td> {{ $d->lastName }} </td>
                    <td> {{ $d->contactNo }} </td>
                    <td> {{ $d->levelName }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!--New Customer Modal-->
    <div class="modal fade" id="newCustomerModal" tabindex="-1" aria-labelledby="newCustomer" aria-hidden="true">
        <!-- <form method="POST" action="/newClient"> -->
        <form id="newClientForm">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newCustomer">New Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="birthdate" class="form-label">Birthdate</label>
                                    <input type="date" class="form-control" id="Birthdate" name="birthDate" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="contactNo" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contactNo" name="contactNo" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="customerLevel" class="form-label">Customer Level</label>
                                    <select class="form-select" id="customerLevel" name="customerLevel">
                                        @foreach ($level as $l)
                                        <option value="{{ $l->levelId }}">{{ $l->levelName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeNewClientBtn">Close</button>
                        <button type="button" onclick="submitNewCLient()" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
</body>

</html>