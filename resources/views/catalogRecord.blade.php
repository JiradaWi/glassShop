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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title"> {{ $data->itemId }}: {{ $data->name }} </h5>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" data-bs-target="#editCatalog" data-bs-toggle="modal" class="btn btn-primary">Edit</button>
                                <!-- <button type="button" class="btn btn-primary">Right</button> -->
                            </div>
                        </div>
                    </div>
                    <p class="card-text">
                    <div class="row">
                        <div class="col-6">
                            <label for="n" class="col-form-label">Name: </label>
                            <div>
                                <input name="n" id="n" type="text" readonly class="form-control-plaintext" value="{{ $data->name }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="bp" class="col-form-label">Base Price: </label>
                            <div>
                                <input name="bp" id="bp" type="text" readonly class="form-control-plaintext" value="{{ $data->basePrice }}">
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-6">
                            <div class="">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Active:
                                </label>
                                @if($data->isActive == 1)
                                <input class="form-check-input" type="checkbox" value="" id="Active" disabled checked>
                                @else
                                <input class="form-check-input" type="checkbox" value="" id="Active" disabled>
                                @endif

                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-12">
                            <label for="r" class="col-form-label">Remark: </label>
                            <div>
                                <textarea class="form-control-plaintext" id="r">{{ $data->remark }}</textarea>
                            </div>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
            <br />
        </div>
    </div>

    <!-- Edit Catalog Modal -->
    <div class="modal fade" id="editCatalog" tabindex="-1" aria-labelledby="editCatalog" aria-hidden="true">
        <form id="editCatalogForm">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newCustomer">Edit {{ $data->name }} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="itemId" name="clientId" value="{{ $data->itemId }}">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="basePrice" class="form-label">Base Price:</label>
                                    <input type="text" class="form-control" id="basePrice" name="basePrice" value="{{ $data->basePrice }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="isActive" class="form-label">Active: </label>
                                    @if($data->isActive == 1)
                                    <input class="form-check-input" type="checkbox" value="" id="isActive" checked>
                                    @else
                                    <input class="form-check-input" type="checkbox" value="" id="isActive">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="remark" class="form-label">Remark:</label>
                                    <textarea class="form-control" id="remark" name="remark" placeholder="">{{ $data->remark }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeNewClientBtn">Close</button>
                        <button type="button" onclick="updateCatalog()" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{asset('js/catalog.js')}}"></script>
</body>

</html>