<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

    <body>
        <h2>Welcome to the site {{$user['name']}}</h2>
        <br/>
        Your registered email-id is {{$user['email']}} , Please click on the below link to change your password
        <br/>
        <a href="{{route('user.change-password', ["token" => $user->token])}}">Change Password</a>
    </body>
</html>
