<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rental</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row text-white justify-content-center" style="margin-top:10%;">
            <div class="col-4">
                <form class="shadow bg-dark border border-light p-3 rounded" action="/action" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                    <div>
                        <p class="text-uppercase text-center fs-4 text-warning">Login sdasdas</p>
                        <hr>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-sm">

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-sm" name="password" id="password">
                    </div>
                    <div class="text-right mb-3"><a href="{{URL::to('car/register')}}"><small>Haven't Account?Just
                                Click</small></a></div>
                    <button type="submit" name="submit" class="form-control btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>