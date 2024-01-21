<?php
session_start();
include_once "../database/database.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $user = $_POST["email"];
    $pass = $_POST["password"];


    if (empty($user) || empty($pass)) {
        header("Location:../auth/login.php?error=User and Password is required ! ");
        exit();
    }

    $sql = "SELECT * FROM users WHERE email = '$user' AND password= '$pass' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['user'] === $email && $row['password'] === $pass) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            header("Location:../admin/dashboard.php");
            exit();
        } 
        }else {
            header("Location:../auth/login.php?error=User or password is Incorect");
            exit();
    }
}