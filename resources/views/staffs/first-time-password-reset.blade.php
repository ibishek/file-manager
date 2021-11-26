<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $user->name }} - Password Reset</title>
    <style>
        .container {
            text-align: center;
        }
        .top-text {
            margin: 30px;
        }
        a {
            color: white;
            text-decoration: none;
            padding: 15px;
            background-color: #12a5ac;
            border-radius: 15px;
        }
        .text-bottom {
            color: red;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <span>Dear, <strong>{{ $user->name }}</strong></span>
        <p class="top-text">Your are advised to change your password immedietly.</p>
        <a href="{{ $url }}">Click Here</a>
        <p class="text-bottom">Link expires within 30 minutes.</p>
    </div>
</body>
</html>