<?php

session_start();

if(isset($_SESSION['Email'])){
session_destroy();
#include("login.php");
echo'<meta http-equiv="refresh"  content="1;url=login.php">' ;

}
?>


