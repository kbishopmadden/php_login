<?php
  # Basic structure for class
  class User{
    // Define vars
    public $db_conn;
    private $user;
    private $is_auth = false;

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
      $this->user = $this->validateCreds( $_POST );
    }

    private function validateCreds($user){
      $this->purifyPassword($user['pass']);
      if( ! $this->isValidEmail( $user['email']) ){
        // TODO $this->addError('Invalid Email Address','Please Enter a Valid Email Address')
      }
    }

    private function isValidEmail($email){
      // TODO: Validate Real Email
      // $is_valid = ...;
      return $is_valid;
    }

    private function purifyPassword($pass){
      // TODO: Purify Password - strip chars or anything that could be used as an injection hack 
      // $pure_pass = ...;
      return $pure_pass;
    }

    private function createUser(){
      $query = 'INSERT INTO users (email, password) VALUES ("'.$email.'", "'.$password.'")';
    }

    private function authUser(){
      $query = 'SELECT id FROM users WHERE email = "'.$email.'" AND password = "'.$password.'"';
    }

  }
?>
