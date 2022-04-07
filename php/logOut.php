<?php
include_once "../class/Baza.php";
$db = new Baza("localhost","root","","users");

if($_POST){
    logOut($db);
}


function logOut($db){
    
    session_start();
    $sessionId = session_id();
    
    $_SESSION = [];
    if(filter_input(INPUT_COOKIE, session_name())){
        setcookie(session_name(),'',time()-42000,'/');
    }
    session_destroy();
    //usuń wpis z id bieżącej sesji z tabeli logged_in_users
    $sql = "DELETE FROM logged_in_users WHERE sessionId='$sessionId'";
    $db->delete($sql);
    header('location: login.php');
    
}