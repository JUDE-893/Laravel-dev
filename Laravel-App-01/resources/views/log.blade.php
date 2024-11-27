<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Floating labels example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    @vite('resources/css/log.css')  <!-- Vite will handle the CSS file -->
  </head>

  <body>
    <div class="d-flex d-column">

      <form class="form-login needs-validation" action="{{route('Login.store')}}" method="post">
        @csrf
        <div class="text-center mb-4">
          <img class=GGG"mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
          <h1 class="h3 mb-3 font-weight-normal">Log In</h1>
        </div>

        <div class="form-label-group">
          <input value="{{old("email")}}" type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus value='' aria-describedby="email-feedback">
          <label for="inputEmail">Email address</label>
          <div id="email-feedback" class="invalidfeedback">
            @error('email') {{$message}} @enderror
          </div>
        </div>

        <div class="form-label-group">
          <input  value="{{old("password")}}" type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
          <label for="inputPassword">Password</label>
          <div id="email-feedback" class="invalidfeedback">
            @error('password') {{$message}} @enderror
          </div>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted text-center">Don't have an account yet? <a href="/paluma/signUp">Create account</a> </p>
      </form>
    </div>
  </body>
</html>
