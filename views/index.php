<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container p-5">
        <form action="../actions/login.php" method="post" class="w-50 mx-auto border rounded-3 p-4">
            <h1 class="display-6 text-center text-uppercase mb-3">Login</h1>

            <input type="text" name="username" placeholder="USERNAMW" class="form-control mb-3">

            <input type="password" name="password" placeholder="PASSWORD" class="form-control mb-3">

            <button type="submit" class="btn btn-primary w-100 mb-3">Log in</button>

            <div class="text-center">
                <a href="register.php" class="text-decoration-none">Create account</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>