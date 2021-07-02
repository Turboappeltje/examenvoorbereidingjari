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

<!-- <form action="/action_page.php">
  <label for="text"></label><br>
  <input type="text" id="text" name="text" value=""><br>
  <input type="submit" value="Submit">
</form>  -->

<!-- <form action="action_page.php" method="post">
	Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  	<br><br>
 Text <input type="text" name="text"><br>
<input type="submit">
</form> -->

<div class="container">
  <form action="action_page.php" method="post">
    <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


