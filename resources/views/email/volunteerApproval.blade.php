<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TRY</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p><img src="<?php echo $message->embed($details['pathToImage']); ?>" style="max-width: 20%;padding-top: 20px;"></p>
    <p>{{ $details['body'] }}</p>

    <p>Thank you</p>
    <p>{{ config('app.name') }}</p>
</body>
</html>
