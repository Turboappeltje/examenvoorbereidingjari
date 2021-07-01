<?php 
include 'database.php';
include '../views/header.php';
session_start();

if(isset($_SESSION['email']) && $_SESSION['email'] == true){

    $_SESSION['loggedin'] = true;

    if ($_SESSION['is_admin'] == 1) {
    	echo 'hello ' . $_SESSION['email'] . ' ,u bent ingelogd als admin';
    }else{
    	echo 'U bent niet gemachtig om aanpassingen te maken, u word nu verwezen naar de inlog pagina';

        header("refresh:3;url=index.php");
    exit;
    }
}
else {
    echo 'U bent niet ingelogd, u word nu verwezen naar de inlog pagina';

    header("refresh:3;url=index.php");
    exit;
}




$db = new database();
$users = $db->select("SELECT id, voornaam, achternaam, email, is_admin, created_at, updated_at FROM gebruiker", []);

        $columns = array_keys($users[0]);
        $row_data = array_values($users);


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
        <table class="table">
            <tr>
                <?php
                    foreach($columns as $column)
                    {echo "<th><strong>$column</strong></th>";}
                ?>

            <th>action</th>
            </tr>

            <?php  
                foreach($row_data as $rows){
                    echo "<tr>";
                    foreach($rows as $data){
                        echo "<td>$data</td>";}
            ?>
                    <td>
                        <a href="update_user.php?id=<?php echo $rows['id']?>">edit</a>
                        <a href="/ExamenvoorbereidingFons/code/delete_user.php?id=<?php echo $rows['id']?>">delete</a>
                    </td>
                    </tr>
                <?php 
                    } 
                ?>

    </table>

	<a href="logout.php">Logout</a>
</body>
</html>
