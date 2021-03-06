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
        <div class="row">
            <!--Client Card-->
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title"> {{ $data->clientId }} {{ $data->firstName }} {{ $data->lastName }}</h5>
                                <h6 class="card-subtitle mb-12 text-muted">{{ $data->levelName }}</h6>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <button type="button" data-bs-target="#editClient" data-bs-toggle="modal" class="btn btn-primary">Edit</button>
                                    <!-- <button type="button" class="btn btn-primary">Right</button> -->
                                </div>

                            </div>
                        </div>
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
                    </div>
                </div>
                <br/>

                <!--Order Card-->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Order History</h5>
                                <h6 class="card-subtitle mb-12 text-muted"></h6>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary" onclick="window.location = '/newOrder/{{ $data->clientId }}'">New Order</button>
                                </div>

                            </div>
                        </div>
                        <p class="card-text">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 92pt">Order Id</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($shoporder) > 0)
                                @foreach ($shoporder as $order)
                                <tr onclick="window.location = '/order/{{$order->orderId}}'">
                                    <td scope="row">{{ $order->orderId }} </td>
                                    <td>{{ $order->orderDate }}</td>
                                    <td>{{ $order->totalPrice }}</td>
                                    <td>{{ $order->statusName }}</td>
                                    <td>{{ $order->remark }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5">No purchase history</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
            <br />

            <!--Eyesight Card-->
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Eyesight History</h5>
                                <h6 class="card-subtitle mb-12 text-muted"></h6>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary" onclick="window.location = '/newEyesight/{{ $data->clientId }}'">New Eyesight</button>
                                </div>

                            </div>
                        </div>
                        <p class="card-text">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 92pt">Date</th>
                                    <th scope="col">Left</th>
                                    <th scope="col">Right</th>
                                    <th scope="col">Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($eyeSightList) > 0)
                                @foreach ($eyeSightList as $eyeSight)
                                <tr>
                                    <td scope="row">{{ $eyeSight->dateMeasure }} </td>
                                    <td>{{ $eyeSight->leftEye }}</td>
                                    <td>{{ $eyeSight->rightEye }}</td>
                                    <td>{{ $eyeSight->remark }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4">No eyesight history</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="modal fade" id="editClient" tabindex="-1" aria-labelledby="editClient" aria-hidden="true">
        <form id="editClientForm">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newCustomer">Edit {{ $data->firstName }} {{ $data->lastName }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="clientId" name="clientId" value="{{ $data->clientId }}">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $data->firstName }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $data->lastName }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="birthdate" class="form-label">Birthdate</label>
                                    <input type="date" class="form-control" id="Birthdate" name="birthDate" placeholder="" value="{{ $data->birthDate }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="contactNo" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contactNo" name="contactNo" placeholder="" value="{{ $data->contactNo }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="customerLevel" class="form-label">Customer Level</label>
                                    <select class="form-select" id="customerLevel" name="customerLevel">
                                        @foreach ($level as $l)
                                        @if ($l->levelId === $data->currentLevel)
                                        <option value="{{ $l->levelId }}" selected>{{ $l->levelName }}</option>
                                        @else
                                        <option value="{{ $l->levelId }}">{{ $l->levelName }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeNewClientBtn">Close</button>
                        <button type="button" onclick="updateClient()" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{asset('js/clientRecord.js')}}"></script>
</body>

</html>