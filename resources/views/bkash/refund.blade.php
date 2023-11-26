<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bKash Refund</title>
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
            color: #333;
        }

        form {
            text-align: left;
            margin-top: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .response {
            margin-top: 20px;
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>bKash Refund</h1>
        <form action="{{ route('url-post-refund') }}" method="POST">
            @csrf
            <label for="paymentID">Payment ID</label>
            <input type="text" id="paymentID" name="paymentID" required>
            
            <label for="trxID">Trx ID</label>
            <input type="text" id="trxID" name="trxID" required>
            
            <label for="amount">Amount</label>
            <input type="text" id="amount" name="amount" required>
            
            <input type="submit" value="Submit">
        </form>
        @if(isset($response))
           <div class="response">{{ $response }}</div>
        @endif
    </div>
</body>
</html>
