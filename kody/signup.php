<?php
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$name  = $_POST['name'];
$connection = new mysqli('localhost', 'root','', 'kody_com');
if ($connection ->connect_error){
    die ('connect error('. $connection ->connect_errno . ')' . $connection ->connect_err);
}
$query = 'INSERT INTO users (email, password) VALUES ("'.$email.'", "'.$password.'")';
echo $query;
if ($connection ->query($query) === TRUE) {
    header("Location: /index.html");
}
?>
