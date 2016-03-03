<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
</head>
<body>
<p>Hello,<br>
<br>
You have asked to reset your password and all my goodness, your wish is heightened !<br>
    Here is the link to change your password : {{ url('password/reset/'.$token) }}
<hr>
<p>Cordialement,<br>
R2D2</p>
</body>
</html>
