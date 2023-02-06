<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bkash Payment</title>
    <style>
      .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
      }

      button {
        background-color: red;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>
</head>
<body>
  <div class="center">
    <form action="{{ route('url-create') }}" method="POST">
      @csrf
      <input type="text" id="amount" name="amount" placeholder="Enter your amount"><br>
      <button type="submit" id="bKash_button">Pay With BKash</button>
    </form>
  </div>

</body>
</html>