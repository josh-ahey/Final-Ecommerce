<?php
include_once ('adb.php');

class admin extends adb{
    
    function login($username,$password){
        $str_query = "SELECT * FROM users WHERE username= '$username' AND password='$password'";
        
        return $this->query($str_query);
    }
}
?>