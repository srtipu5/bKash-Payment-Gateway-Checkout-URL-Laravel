<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bkash Refund</title>
</head>
<body>
    <div style="text-align: center;">
        <br><br>
        <form action="{{ route('url-post-refund') }}" method="POST">
            @csrf
            <label for="paymentID">PaymentID:</label>
            <input type="text" id="paymentID" name="paymentID" required ><br><br>
            <label for="trxID">TrxID:</label>
            <input type="text" id="trxID" name="trxID" required ><br><br>
            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" required ><br><br>
            <input type="submit" value="Submit">
          </form>
    </div>
    <br><br>
    <div style="text-align: center;">
        @if(isset($response))
           {{ $response }}
        @endif
    </div>
</body>
</html>