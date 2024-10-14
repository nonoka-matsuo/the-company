<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dbc5b98639.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- menu -->
     <?php 
     session_start();
     include "nav.php" ;
     
     include "../classes/User.php";
     
     $u = new User;
     $all_users = $u->readAll();
     
     ?>
    <div class="container px-5">
     <h2 class="h4 mb-2">User List</h2>

     <table class="table table-hover align-middle">
      <thead class="table-secondary">
        <tr>
          <th>#</th>
          <th>First name</th>
          <th>Last name</th>
          <th>Username</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while($user = $all_users->fetch_assoc()){ ?>
          <tr>
            <td><?= $user['id']?></td>
            <td><?= $user['first_name']?></td>
            <td><?= $user['last_name']?></td>
            <td><?= $user['username']?></td>
            <td>
                <!-- buttons -->
                <!-- edit -->
                 <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-warning">  
                  <!-- ? = separate -->
                 <i class="fa-solid fa-pen"></i>
                 </a>
                 <!-- delete -->
                  <?php if($user['id'] != $_SESSION['user_id']){ ?>
                    <a href="confirm-delete.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-danger ms-1">
                        <i class="fa-solid fa-trash"></i>
                  </a>
                <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
     </table>
    </div>
</body>
</html>