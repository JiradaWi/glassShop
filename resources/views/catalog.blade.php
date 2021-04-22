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

        <div class="mb-3">
            <div class="row">
                <div class="col-10">
                    <label for="searchCatalog" class="form-label">Search Catalog:</label>
                    <input id="searchCatalog" type="text" class="form-control" aria-describedby="searchHelp" onkeyup="searchCatalog(event)" name="searchKeyword">
                    <div id="searchHelp" class="form-text">Search by name.</div>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-primary" style="margin-top:16%" data-bs-toggle="modal" data-bs-target="#newCatalog">New Item</button>
                </div>

            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Base Price</th>
                    <th scope="col">Remark</th>
                    <th scope="col" style="text-align: center;">Is Active</th>
                </tr>
            </thead>
            <tbody id="catalogDetail">
                @foreach ($data as $d)
                <tr>
                    <td> {{ $d->itemId }} </td>
                    <td> {{ $d->name }} </td>
                    <td> {{ $d->basePrice }} </td>
                    <td> {{ $d->remark }} </td>
                    <td style="text-align: center;">
                        @if( $d->isActive == 1 )
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- New Catalog Card -->
    <div class="modal fade" id="newCatalog" tabindex="-1" aria-labelledby="newCatalog" aria-hidden="true">
        <form id="newCatalogForm">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newCustomer">New Catalog</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="basePrice" class="form-label">Base Price:</label>
                                    <input type="text" class="form-control" id="basePrice" name="basePrice" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="isActive" id="isActive" checked>
                                    <label class="form-check-label" for="isActive">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label for="remark" class="form-label">Remark:</label>
                                <textarea class="form-control" id="remark" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeNewClientBtn">Close</button>
                        <button type="button" onclick="newCatalog()" class="btn btn-primary">Save</button>
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