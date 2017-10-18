<!DOCTYPE html>
<html lang="en">

<head>

    <title>Register</title>

</head>

<body>

<div class="container">

    <form method="POST" action="/signUp">
        <input class="form-control" placeholder="username" name="username" type="text"><br>
        {{csrf_field()}}
        <input class="form-control" placeholder="Password" name="password" type="password"><br>
        <button type="submit" class="btn btn-lg btn-success btn-block button-login">Sign up</button>
    </form>
    @if($errors)
        <span class="help-block">{{ $errors->first() }}</span>
    @endif
</div>


</body>

</html>