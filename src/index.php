<?php 
session_start();
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            .badge {
                margin-left : 10px;
            }
        </style>
    </head>
    <body>
        
        <div class="container" id="main_container">
            <h1>MySQL Data Correction</h1>
            <div class="card" id="connection">
                <div class="card-body" style="padding : 20px">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Host</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="host" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Port</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="port" value="3306">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="username" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Database</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="database" value="">
                        </div>
                    </div>
                </div>

                <div class="container text-center" style="margin-bottom : 20px;">
                    <a class="btn btn-primary" href="javascript:;" data-aksi="gettables">Get Tables Description</a>
                </div>
            </div>
        </div>
    </body>
    <script src="scripts/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="scripts/app.js"></script>
</html>
