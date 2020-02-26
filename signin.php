<?php
$email = $_POST['email'];
$password = $_POST['password'];
$connection = new mysqli('localhost', 'root','', 'kody_com');
if ($connection ->connect_error){
    die ('connect error('. $connection ->connect_errno . ')' . $connection ->connect_err);
}
$query = 'SELECT * FROM users WHERE email = "'.$email.'"';
echo $query;
if ($result = $connection ->query($query)) {
        $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])){
        echo  "passwords match";
        header("Location: /loggedin.html");
    } else{
        echo $row["password"];
        echo  "passwords dont match";
        // header("Location: /signup.html");
    }
}else{
    
}
?>