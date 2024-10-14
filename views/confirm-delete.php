<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dbc5b98639.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
    <?php
        include "../classes/User.php";

        $u = new User;
        $user = $u->getUser($_GET['id']);
    ?>
    <div class="container text-center">
        <i class="fa-solid fa-triangle-exclamation text-warning"></i>
        <h1 class="h4 text-danger mt-3 mb-4">DELETE USER</h1>

        <p>Are you sure you want to delete user <strong><?= $user['username'] ?></strong>?</p>

        <a href="dashboard.php" class="btn btn-secondary me-3">Cancel</a>
        <form action="../actions/delete-user.php?id=<?= $user['id'] ?>" method="post" class="d-inline">
            <button type="submit"  class="btn btn-outline-danger">DELETE</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>