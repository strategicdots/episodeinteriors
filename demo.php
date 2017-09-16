<?php
include_once("includes/initialize.php"); 
$password = password_hash('secret', PASSWORD_BCRYPT,['cost' => 11]);
echo $password; exit;