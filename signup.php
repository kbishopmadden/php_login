<?php
$email = $_POST['email'];
$password = $_POST['password'];
$connection = new mysqli('localhost', 'root','', 'kody_com');
if ($connection ->connect_error){
    die ('connect error('. $connection ->connect_errno . ')' . $connection ->connect_err);
}
$query = 'INSERT INTO users (email, password) VALUES ("'.$email.'", "'.$password.'")';
echo $query;
if ($connection ->query($query) === TRUE) {
    header("Location: /signin.html");
}
?>
