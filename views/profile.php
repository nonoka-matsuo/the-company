<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/dbc5b98639.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
        session_start();
        include "nav.php";

        include "../classes/User.php";
        $u = new User;
        $user = $u->getUser($_SESSION['user_id']);
    ?>
    <div class="container">
        <form action="../actions/upload-photo.php" method="post" enctype="multipart/form-data">
            <div class="card w-50 mx-auto">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <!-- photo -->
                             <?php if($user['photo']){ ?>
                                <img src="" alt="" class="avatar-img">
                            <?php }else{ ?>
                                <i class="fa-solid fa-user text-secondary avatar-icon"></i>
                            <?php } ?>
                        </div>
                        <div class="col align-self-center">
                            <input type="file" name="photo" class="form-control form-control-sm w-auto">
                            <button type="submit" class="btn btn-sm mt-2 btn-outline-secondary">Upload Photo</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="h3"><?= $_SESSION['full_name'] ?></h2>
                    <h3 class="h5"><?= $_SESSION['username'] ?></h3>
                </div>
            </div>
        </form>
    </div>
</body>
</html>