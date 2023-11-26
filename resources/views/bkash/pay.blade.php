<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bKash Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 15px 32px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="center">
        <form action="{{ route('url-create') }}" method="POST">
            @csrf
            <label for="amount">Enter Your Amount</label>
            <input type="text" id="amount" name="amount" placeholder="Amount" required>
            <button type="submit" id="bKash_button">Pay with bKash</button>
        </form>
    </div>
</body>
</html>
