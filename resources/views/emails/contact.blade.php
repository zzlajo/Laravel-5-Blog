<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Constac blog form</title>
</head>
<body>
<p>Hello,<br>
<br>
This mail is send from laravel 5 blog site</p>
<p>Sender informations :</p>
<ul>
    <li><strong>Name</strong> : {{ $data['contactName'] }}</li>
    <li><strong>Email</strong> : {{ $data['contactEmail'] }}</li>
    <li><strong>Message</strong> : {!! $data['contactMessage'] !!}</li>
</ul>
<hr>
<p>By :)t</p>
</body>
</html>
