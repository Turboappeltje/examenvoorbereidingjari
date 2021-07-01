<?php

class database {
	
	private $dbh;
	public function __construct(){
		try {
			$dsn = "mysql:host=localhost;dbname=examenvoorbereidingjari_f;charset=utf8";
			$this->dbh = new PDO($dsn, 'root', '');
			// echo "Database connectie gemaakt ";
		} catch (\PDOException $exception){
			exit('Database connectie gefaald. Error message: ' . $exception->getMessage());
		}
	}

	public function insert_admin(){


	$hashed_password = password_hash('admin', PASSWORD_DEFAULT);
	$sql = "INSERT INTO users VALUES 
	(NULL, :type_id, :username, :email, :password, :created_at, :updated_at)";
	$statement = $this->dbh->prepare($sql);
	$statement->execute([
		'type_id' => '1',
		'username' => 'admin',
		'email' => 'admin@gmail.com',
		'password' => $hashed_password,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		]);
	}

	public function insert_user(){

	$hashed_password = password_hash('123', PASSWORD_DEFAULT);
	$sql = "INSERT INTO gebruiker VALUES 
	(NULL, :voornaam, :achternaam, :email, :wachtwoord, :is_admin, :created_at, :updated_at)";
	$statement = $this->dbh->prepare($sql);
	$statement->execute([
		'voornaam' => 'jan',
		'achternaam' => 'veenstra',
		'email' => 'jan@hotmail.com',
		'wachtwoord' => $hashed_password,
		'is_admin' => false,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		]);
	}

	//signup form for admin
	public function create_admin($username, $password, $email){

	$hashed_password = password_hash('admin', PASSWORD_DEFAULT);
	// TRUNCATE TABLE users;
	$sql = "INSERT INTO users VALUES 
	(NULL, :type_id, :email, :username, :password, :created_at, :updated_at)";
	$statement = $this->dbh->prepare($sql);
	$statement->execute([
		'type_id' => '1',
		'email' => $email,
		'username' => $username,
		'password' => $hashed_password,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		]);
	echo "signup succesfull";
	  // header("refresh:3;url=index.php"); 
	}

	//signup form for admin
	public function create_user($username, $password, $email){

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$sql = "INSERT INTO users VALUES 
	(NULL, :type_id, :email, :username, :password, :created_at, :updated_at)";
	$statement = $this->dbh->prepare($sql);
	$statement->execute([
		'type_id' => '2',
		'email' => $email,
		'username' => $username,
		'password' => $hashed_password,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		]);
	echo "signup succesfull";
	  // header("refresh:3;url=index.php"); 
	}
		public function update_user($id, $type_id, $username, $email){
			// exit("het werkt");
        // password_verify($password, $hashed_password);
        
        $sql = "UPDATE users SET id = :id, type_id = :type_id, email = :email, username = :username, updated_at = :updated_at WHERE id = :id";

        $statement = $this->dbh->prepare($sql);
        $statement->execute([
        'id' => $id,
        'type_id' => $type_id,
        'email' => $email,
        'username' => $username,
        // 'password' => $hashed_password,
        'updated_at' => date('Y-m-d H:i:s')
        ]);
        echo '<script language="javascript">';
            echo 'alert("Gegevens updated")';
            echo '</script>';
        header("refresh:1");
    }

	public function delete_user($id){
		$sql = "DELETE FROM users WHERE id = :id";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute($id);
	}

	public function login($email, $wachtwoord){
		$sql = "SELECT id, voornaam, achternaam, is_admin, email, wachtwoord FROM gebruiker WHERE email = :email";

        $stmt = $this->dbh->prepare($sql);

        $stmt->execute(['email'=>$email]);
     
        $result = $stmt->fetch();
        // var_dump($result);

               $hashed_password = $result['wachtwoord'];
                // var_dump( password_verify($password, $hashed_password));
               
        if ($email && password_verify($wachtwoord, $hashed_password)) {

                    session_start();
                    // userdate opslaan in session variables
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['voornaam'] = $result['voornaam'];
                    $_SESSION['achternaam'] = $result['achternaam']; 
                    $_SESSION['email'] = $result['email']; 
                    $_SESSION['loggedin'] = true;
                    $_SESSION['is_admin'] = $result['is_admin'];

                    echo 'Login succesfull';


                    if ( $_SESSION['is_admin'] == 1) {
                    	 header("refresh:3;url=code/welcome_admin.php");
                    	 exit;
                    }else{
                    	header("refresh:3;url=index.php"); 
                    exit;
                    }
                    
        }else{
        	echo '<script language="javascript">';
			echo 'alert("Username and password do not match")';
			echo '</script>';
        	echo 'Username and password do not match';
        }
	        
	}

	public function select($statement, $named_placeholder){

        // prepared statement (send statement to server  + checks syntax)
        $statement = $this->dbh->prepare($statement);

        $statement->execute($named_placeholder);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
        var_dump($result);

    }
    
    // public function hours_overview()
    // {
    // 	$sql='SELECT * FROM hours'
    // 	$statement = $this->dbh->prepare($statement);
    // }
    public function create_default_hours()
    {
    $sql= "INSERT INTO hours VALUES 
	(NULL, :departments_id, :user_id, :start_at, :end_at, :created_at, :updated_at)";
	$statement = $this->dbh->prepare($sql);
	$statement->execute([
		'departments_id' => '1',
		'user_id' => '1',
		'start_at' => date('Y-m-d H:i:s'),
		'end_at' => date('Y-m-d H:i:s'),
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
		]);
    }
    public function assign_default_users_to_department_user()
    {
    	$sql= "INSERT INTO department_user VALUES 
		(:departments_id1, :user_id1),
		(:departments_id2, :user_id1)";
		$statement = $this->dbh->prepare($sql);
		$statement->execute([
		'user_id1' => '1',
		'departments_id1' => '1',
		'departments_id2' => '2'
		]);
    }
    public function update_hours($id, $departments_id, $user_id, $start_at, $end_at)
    {
    	$sql = "UPDATE hours SET departments_id = :departments_id, user_id = :user_id, start_at = :start_at, end_at = :end_at, created_at = :created_at, updated_at = :updated_at WHERE id = :id";

        $statement = $this->dbh->prepare($sql);
        $statement->execute([
        'id' => $id,
        'departments_id' => $departments_id,
        'user_id' => $user_id,
        'start_at' => $start_at,
        'end_at' => $end_at,
        'created_at' => date('Y-m-d H:i:s'),
        // 'password' => $hashed_password,
        'updated_at' => date('Y-m-d H:i:s')
        ]);
        echo '<script language="javascript">';
            echo 'alert("Gegevens updated")';
            echo '</script>';
        header("refresh:1");
    }
    public function delete_hours($id){
		$sql = "DELETE FROM hours WHERE id = :id";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute($id);
	}
	public 	function create_hour($user_id, $departments_id, $start_at, $end_at)
	{
		$sql = "INSERT INTO hours VALUES 
		(NULL, :user_id, :departments_id, :start_at, :end_at, :created_at, :updated_at)";
		$statement = $this->dbh->prepare($sql);
		$statement->execute([
			'user_id' => $user_id,
			'departments_id' => $departments_id,
			'start_at' => $start_at,
			'end_at' => $end_at,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
			]);
		echo "succesfull";
		  // header("refresh:3;url=index.php"); 
	}
	public function users_per_department($department_id)
	{
		$sql = "SELECT user_id, users.username
		FROM department_user
		INNER JOIN users ON user_id = users.id
		WHERE department_id = :department_id)";

		$statement = $this->statement_execute($sql, [
			'department_id' => $department_id
		]);

		return $statement->fetchAll(PDO::FETCH_ASSOC);		
}
	public function remove_user_from_department($department_id, $user_id)
	{
		$sql = "DELETE FROM department_user
		WHERE department_id = :department_id
		AND user_id = :user_id";
		$this->statement_execute($sql, [
			'department_id' => $department_id,
			'user_id' => $user_id
		]);
	}
	public function add_user_to_department($department_id, $user_id)
	{
		$sql = "INSERT INTO department_user (:department_id, :user_id)";

		$this->statement_execute($sql, [
			'department_id' => $department_id,
			'user_id' => $user_id
		]);
	}
}	


?>