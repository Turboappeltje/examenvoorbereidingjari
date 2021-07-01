<?php
include '../views/header.php';  
session_start();

if(isset($_SESSION['email']) && $_SESSION['email'] == true){

    $_SESSION['loggedin'] = true;

    if ($_SESSION['is_admin'] == 1) {
    	echo 'hello ' . $_SESSION['email'] . ' ,u bent ingelogd als admin';
    	
    }else{
    	echo 'U bent niet gemachtig voor deze pagina, u word nu verwezen naar de inlog pagina';

    // header("refresh:3;url=index.php");
    exit;
    }
}

 ?>
<!-- <!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
  
</body>
</html> -->

<!-- <br>
    <a href="signup_admin.php">voeg admin toe</a><br>
    <a href="signup.php">voeg user toe</a><br>
    <a href="users.php">user overzicht</a><br>
    <a href="./code/logout.php">Logout</a> -->

<!--   <ul>
  <li><a href="signup_admin.php">voeg admin toe</a></li>
  <li><a href="signup.php">voeg user toe</a></li>
  <li><a href="users.php">user overzicht</a></li>
  <li><a href="./code/logout.php">Logout</a></li>
</ul> -->
