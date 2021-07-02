<?php
include 'environment_variables.php';
// include 'code/database.php';
include 'views/header.php';
$db = new Database($db_user, $db_pass);
// var_dump($db);
// $db = new Database();
// $db->insert_admin();
 // $db->insert_user();
// $db->create_admin("admin", "admin", "admin@example.org");

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $db = new Database();
      
    $db->login($username, $password);


}
?>
<!DOCTYPE html>
<html>
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login" class="btn btn-info btn-md" value="Login">Login</button>
                                <!-- <input type="submit" name="submit" class="btn btn-info btn-md" value="submit"> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
