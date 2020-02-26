<?php
$email = $_POST['email'];
$password = $_POST['password'];
$connection = new mysqli('localhost', 'root','', 'kody_com');
if ($connection ->connect_error){
    die ('connect error('. $connection ->connect_errno . ')' . $connection ->connect_err);
}
$query = 'SELECT id FROM users WHERE email = "'.$email.'" AND password = "'.$password.'"';
echo $query;
if ($result = $connection ->query($query)) {
    if($result -> num_rows >=1){
        header("Location: /loggedin.html");
    } 
}
?>