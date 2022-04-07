<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <link href="../css/styles.css" rel="stylesheet" />
        <style>
                body {background-image: url("../assets/img/header-bg.jpg");}
        </style>
    </head>
    <body>
        <section class="page-section" id="loginForms">
            <div class="container" id="main">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase" style="color:white;" >Zaloguj się</h2>
                   
                </div>
                <form id="registrationForm" action="./login.php" method='POST' >
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-sm-6 col-6">
                            <div class="form-group">
                                <input class="form-control" id="email" type="text" name="email" placeholder="Email" required="required" />
                                <p class="help-block text-danger" id="nameError"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="passwd" type="password" name="passwd" placeholder="Hasło" required="required" />
                                <p class="help-block text-danger" id="lastNameError"></p>
                            </div>
                            
                        </div>
                        
                    </div>  
                    <div class="text-center">
                        <button class="btn btn-primary btn-xl text-uppercase" value="zaloguj" name="zaloguj" type="submit">Zaloguj</button></br>
                    </div>
                </form>
                <div class="text-center" style="color:white;">
                        Nie masz konta?<button type="button" id="registrationBtn" onclick="goToReg()" class="btn btn-link .btn-sm" >Zarejestruj się</button>
                 </div>
            </div>
        </section>
        <script src="../js/login.js"></script>
    </body>
</html>

<?php
function login($db){
    $args = ['email' => FILTER_SANITIZE_ADD_SLASHES,
            'passwd' => FILTER_SANITIZE_ADD_SLASHES];

    $dane = filter_input_array(INPUT_POST, $args);

    $email = $dane['email'];
    $passwd = $dane['passwd'];
    $userId = $db->selectUser($email,$passwd,"users");
    if($userId >= 0 ){
        session_start();
        $sql = "DELETE FROM logged_in_users WHERE userId='$userId'";
        $db -> delete($sql);
        $sessionId = session_id();
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO logged_in_users (sessionId,id,lastUpdate)".
                "VALUES ('$sessionId','$userId','$date')";
        $db -> insert($sql);
    }

    return $userId;
}


include_once "../class/Baza.php";
$db = new Baza("localhost","root","","users");
if(filter_input(INPUT_POST, "zaloguj")){
    $userId = login($db);
    if($userId > 0){
        echo "POprawne logowanie użytkownika o id: $userId";
        header("location:../index.php");
    }else{
        echo "Błędna nazw użytkownika lub hasło";
    }
}

?>