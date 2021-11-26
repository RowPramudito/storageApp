<?php

session_start();
if($_SESSION['status'] == "login") {
    session_destroy();
    unset($_SESSION['status']);
    header("location:login_page.php?message=logout");
}
else{
    $connect = new mysqli("localhost", "root", "", "responsi");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($connect, "select * from staff where username='$username' and password='$password'");

    $check = mysqli_num_rows($query);

    if($check > 0){
        while($data = mysqli_fetch_array($query)) {
            $_SESSION['full_name'] = $data['full_name'];
        }
        $_SESSION['username'] = "$username";
        $_SESSION['status'] = "login";
        header("location:main_page.php?view=home");
    }
    else{
        header("location:login_page.php");
    }
}

?>