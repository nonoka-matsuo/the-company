<?php

include "../classes/User.php";

$user = new User;

$user->deleteUser($_GET['id']);