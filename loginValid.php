<?php
include ("login.php");
require_once './Twig/Autoloader.php';

    session_start();
    if (isset($_GET['username'])&&isset($_GET['password'])){
        echo"im hereeee";
    $obj = new admin();

    $username = $_GET['username'];
    $password = $_GET['password'];
    $row=$obj->login($username, $password);
    $fetch=$row->fetch_array(MYSQLI_ASSOC);
        print_r ($fetch);
//    $len = mysqli_num_rows($rows);
    if($fetch['username']===$username && $fetch['password']===$password){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("location: index.php");
        echo "oh yes";
    }
    else{
         header("location: logintemp.php");
        echo "hello";
        }
//         header("location: ../servefood/template/servefood.php");
    }
?>