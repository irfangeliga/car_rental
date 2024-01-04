<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body class="bg-light" style="background-image:url('../img/background.jpg');background-size: cover;">
   <div class="container">
    <br>
   <?php
    if(!empty($error)){
        echo "<div class='d-flex justify-content-center'>";
        echo "<div class='alert alert-primary w-50' role='alert'>";
        echo $error;
        echo "</div>";
        echo "</div>";
    }
   ?>
    <div class="row text-white justify-content-center align-self-center" style="margin-top:5%;">
        <div class="col-xl-5">
            <form class="shadow bg-dark border border-light p-4 rounded" action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- {{ csrf_field() }} -->
                <div >
                    <h5 class="text-uppercase text-center fs-4 fw-bold">Registrasi</h5>
                    <hr>
                </div>
                <div class="row shadow ">
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkapku</label>
                            <input type="text" name="name" id="name" class="form-control form-control-sm" required >
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="form-control form-control-sm" required >
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-sm" required >
                        </div>
                        <div class="mb-3">
                            <label for="sim" class="form-label">Nomor SIM</label>
                            <input type="text" name="no_sim" id="sim"  class="form-control form-control-sm" required >
                        </div>
                    </div>
                </div>
                <div class="row mt-2 mb-3">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea type="text" name="alamat" id="alamat"  class="form-control form-control-sm" required ></textarea>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-sm" required name="password" id="password" >
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label for="konfir" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control form-control-sm" onfocusout="myConfirm()" required id="konfir" >
                            <input type="hidden" value="2" name="status">
                            <p id="warning"></p>
                        </div>
                    </div>
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary form-control">SUBMIT</button>
            </form>
        </div>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        function myConfirm(){
            let pass = document.getElementById("password").value;
            let confirm_pass = document.getElementById("konfir").value;
            if(pass != confirm_pass){
                document.getElementById("warning").innerHTML = "Password Confirm and new password not same";
                document.getElementById("warning").style.color = "red";
                document.getElementById("submit").disabled  = true;
            }else{
                document.getElementById("warning").style.display = "none";
                document.getElementById("submit").disabled  = false;
            }
        }
    </script>
  </body>
</html>