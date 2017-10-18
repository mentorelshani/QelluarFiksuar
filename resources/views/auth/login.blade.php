<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>


</head>

<body>

<div class="container">
    <form method="POST" action="/login">
        <input class="form-control" placeholder="username" name="username" type="text"><br>
        {{csrf_field()}}
        <input class="form-control" placeholder="Password" name="password" type="password" value=""><br>
        <button type="submit" class="btn btn-lg btn-success btn-block button-login">Login</button>
    </form>
    <a href="/signUp"><button>Sign up</button></a>
    @if($errors)
        <span class="help-block">{{ $errors->first() }}</span>
    @endif
    

</div>


</body>

</html>