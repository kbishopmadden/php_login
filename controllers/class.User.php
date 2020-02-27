<?php
  # Basic structure for class
  class User{
    // Define vars
    public $db_conn;
    private $user;
    public $is_auth = false;

    function __construct(){
      // Code here gets executed upon making the Class/Object
      $this->init();
    }

    function init(){
      // Connect to DB..
      $this->db_conn = $this->dbConnect(); 
      $this->setUsersPost();
    }

    private function dbConnect(){
      $connection = new mysqli('localhost', 'root','', 'kody_com') OR die ( 
        "CONNECT ERROR({$connection ->connect_errno}) {$connection ->connect_err}" 
      );
      return $connection;
    }

    private function setUsersPost(){
      if($_GET['page'] === 'profile')
      $this->user = $this->validateCreds( $_POST );
    elseif ($_GET['page'] === 'create-new-user')
      $this->user = $this->createCreds( $_POST );
    else
      echo"nothing";
    }

    private function validateCreds($user){
      if( ! $this->isValidEmail( $user['email']) ){
        $email = $user['email'];
        $password = $user['password'];
        if($db_conn->query($this->authUser())){
          $row = mysqli_fetch_assoc($result);
          if(password_verify($password, $row["password"])){
              echo  "passwords match";
          } else{
              echo  "passwords dont match";
              // header("Location: /signup.html");
          }

        }else{
          
        }
      }
        // TODO $this->addError('Invalid Email Address','Please Enter a Valid Email Address')
    }

    private function createCreds($user){
      
      if( $this->isValidEmail( $user['email']) ){
        $this->createUser($user);
      }
        // TODO $this->addError('Invalid Email Address','Please Enter a Valid Email Address')
    }

    private function isValidEmail($email){
        $is_valid = false;
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
          $is_valid = true;
        }
      return $is_valid;
    }

    private function purifyPassword($pass){
      $pure_pass = password_hash($pass, PASSWORD_DEFAULT);
      return $pure_pass;
    }

    private function createUser($user){
      
      $email = $user['email'];
      $name  = $user['name'];
      $password = $this->purifyPassword($user['password']);

      $query = 'INSERT INTO users (email, password, name) VALUES ("'.$email.'", "'.$password.'", "'.$name.'")';
      if ($this->dbConnect() ->query($query) === TRUE) {
          echo "user created";
      }
    }

    private function authUser(){
    
      $query = 'SELECT * FROM users WHERE email = "'.$email.'"';
    
    }

  }
?>
