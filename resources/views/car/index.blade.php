<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@include('car/login')
    <h1>popopo</h1>
    @if (session('Error'))
     <div class="alert alert-success">
         {{ session('Error') }}
     </div>
    @endif
    <?php
    
    echo session('email'); ?>
</body>
</html>