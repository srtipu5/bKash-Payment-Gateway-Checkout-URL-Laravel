<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Failed</title>
</head>
<body>
    <div style="text-align: center">
         <h1>Sorry !! Payment Failed, Please try again later.</h1>
    </div>
    <br><br>
    <div style="text-align: center; color: red;">
        @if(isset($response))
           {{ $response }}
        @endif
    </div>
</body>
</html>