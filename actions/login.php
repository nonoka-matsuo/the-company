<?php

include "../classes/User.php";

//create an object
$user = new User;

//call function
$user->login($_POST);
