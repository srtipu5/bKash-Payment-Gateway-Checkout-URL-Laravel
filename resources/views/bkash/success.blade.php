<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }

        h1 {
            color: #27ae60;
        }

        p {
            color: #333;
            margin-bottom: 20px;
        }

        .response {
            color: #333;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your payment has been successfully done.</h1>
        <p>
            @if(isset($response))
                <span class="response">bKash trx ID: {{ $response }}</span>
            @endif
        </p>
    </div>
</body>
</html>
