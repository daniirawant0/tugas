<?php
session_start();
include('koneksi.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    
}
    $chek = mysqli_num_rows($query);
    if ($chek > 0) {
        header("location: dashboard.php");
    }
    else {
        echo "Username dan Password Salah";
        header("location: index.html");
    }

?>