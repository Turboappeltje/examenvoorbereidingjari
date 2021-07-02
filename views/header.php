<?php  
include_once 'C:\xampp\htdocs\examenvoorbereidingjari_f\code\database.php';
$db = new Database();
?>
<!DOCTYPE html>
<html>
<head>
  <html lang="en">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/examenvoorbereidingjari_f/css/main.css">
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/examenvoorbereidingjari_f/code/welcome_admin.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/examenvoorbereidingjari_f/code/gebruikers.php">Gebruikersoverzicht</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/examenvoorbereidingjari_f/code/logout.php">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </nav>

