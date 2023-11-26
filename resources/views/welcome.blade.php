<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .payment-form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .payment-header {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .payment-button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
            display: inline-block;
            width: 100%;
        }

        .payment-button:hover {
            background-color: #45a049;
        }

        .refund-button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
            display: inline-block;
            width: 100%;
        }

        .refund-button:hover {
            background-color: #d9534f;
        }
    </style>
</head>
<body>

<div class="payment-form">
    <h2 class="payment-header">bKash Payment Gateway</h2>
    
    <form action="{{ route('url-pay') }}" method="GET">
        @csrf
        <button type="submit" class="payment-button">Click Here For Payment</button>
    </form>

    <form action="{{ route('url-get-refund') }}" method="GET">
        @csrf
        <button type="submit" class="refund-button">Click Here For Refund</button>
    </form>
</div>

</body>
</html>
