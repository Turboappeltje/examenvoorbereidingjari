<?php  
include_once '../code/database.php';
$db = new Database();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	 <link rel="stylesheet" type="text/css" href="/examenvoorbereidingjari_f/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="/examenvoorbereidingjari_f/code/gebruikers.php" tabindex="-1" aria-disabled="true">Gebruikers overzicht</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/examenvoorbereidingjari_f/code/logout.php" tabindex="-1" aria-disabled="true">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

