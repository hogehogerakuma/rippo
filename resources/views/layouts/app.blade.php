<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=390px, initial-scale=1">

        <title>Rippo♡</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <style type="text/css">
            .test {
             cursor: url('/images/pointerimages.png'),url('/images/pointerimages.cur'), pointer;
            }
        </style>
    </head>
    <?php
    if(!isset($bgimage)) {
        $bgimage = '/images/notebook.jpg';
    }
    ?>
    <body style=
    "color: white; 
    min-height: 100vh;
    background-image:url({{$bgimage}});
    background-color:pink;
    background-size: 100% 110%;
    background-repeat: no-repeat;
    background-attachment: fixed;">
                @include('commons.navbar')

        <div class="container" >
            @include('commons.error_messages')

            @yield('content')
        </div>
    </body>
</html>