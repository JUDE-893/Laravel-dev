<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Sign Up</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    @vite('resources/css/log.css')  <!-- Vite will handle the CSS file -->
  </head>

  <body>
    <form class="form-signin" action="/paluma/store" method="post">
      @csrf
      <div class="text-center mb-4">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
      </div>

      <div class="form-label-group">
        <input type="text" id="inputFname" class="form-control" name='data[]' placeholder="first name²" required autofocus>
        <label for="inputfname">First Name</label>
      </div>

      <div class="form-label-group">
        <input type="text" id="inputLname" class="form-control" name='data[]' placeholder="last name" required >
        <label for="inputlname">Last Name</label>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" name='data[]' placeholder="Email address" required >
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name='data[]' placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputcomfirmePassword" class="form-control" name='data[]' placeholder="confirme Password" required>
        <label for="inputcomfirmePassword">Confirme Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" name='data[]'> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">Already have an account? <a href="/paluma/Login/?login=true">Log In</a> </p>

    </form>
  </body>
</html>
