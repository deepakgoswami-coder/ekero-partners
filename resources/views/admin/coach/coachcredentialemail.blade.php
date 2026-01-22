<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Coach Credentials</title>
</head>
<body>

<p>Hello {{ $coach->name }},</p>

<p>Your coach account has been created successfully.</p>

<p><strong>Login Details:</strong></p>

<p>
    Email: {{ $coach->email }} <br>
    Password: {{ $password }}
</p>

<p>
    Login URL: <br>
    <a href="https://ekeropartnersempowerwealth.com/">{{ $webUrl }}</a>
</p>

<p>
    Please login and Be a Part Of Incredible Journey & Empowering Businessess.
</p>

<p>
    Regards,<br>
    Ekero Partners Team
</p>

</body>
</html>
