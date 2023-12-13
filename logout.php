<?php
    session_start();
    require("connect.php");
    $user_email = $_SESSION["user_data"]["user_email"];
    $sql = "UPDATE `user` SET `user_login_status`='Logout' WHERE `user_email` = '$user_email'";
    $result = mysqli_query($conn, $sql);
    session_destroy();

    header("location: login.php");

?>