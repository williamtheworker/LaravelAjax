<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, inital-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{ config('app.name', "Laravel Ajax") }} </title>

        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="login-page">
            <div class="container">
                <button type="button" class="btn btn-success add-provider-modal" data-toggle="modal" data-target="#myModal">
                    Add Provider
                </button>
            </div>
            <div class="container text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Url</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="providers-table-body">
                        hello
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title crud-modal-title">Add Provider</h4>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="hidden" class="form-control input-prov-id">
                            <input type="text" class="form-control input-name" placeholder="Name" aria-label="Name" aria-describedby="Name">
                            <input type="text" class="form-control input-url" placeholder="Url" aria-label="Url" aria-describedby="Url">
                        </div>
                    </div>
                    <div class="modal-footer crud-modal-footer">
                        <button type="button" class="btn btn-success" id="add-provider">Add</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            
            </div>
        </div>

        <div class="modal fade" id="imgModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Img From Provider</h4>
                    </div>
                    <div class="modal-body img-modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            
            </div>
        </div>

        <script src="{{ asset('js/home.js') }}"></script>
    </body>
</html>
