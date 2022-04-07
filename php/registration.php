<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <link href="../css/styles.css" rel="stylesheet" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>CodeITbetter</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/ekko-lightbox.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../css/lightbox.css" /> 
        <style>
                body {background-image: url("../assets/img/header-bg.jpg");}
        </style>
    </head>
    <body>
        <section class="page-section" id="loginForms">
            <div class="container" >
                <div class="text-center">
                    <h2 class="section-heading text-uppercase" style="color:white;">Zarejestruj się</h2>
                    <!--<h3 class="section-subheading text-muted">Aby zarejstować się na kurs wypełnij poniższy formularz.</h3>-->
                </div>
                <form id="registrationForm" action="./registration.php" method="POST">
                    <div class="row justify-content-center">
                        <div class="col-2">
                            <div class="form-group">
                                <input class="form-control" id="fName" type="text" name="fName" placeholder="Imię *" required="required"/>
                                <p class="help-block text-danger" id="nameError"></p>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <input class="form-control" id="lastName" type="text" name="lastName" placeholder="Nazwisko *" required="required" />
                                <p class="help-block text-danger" id="lastNameError"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" name="email" placeholder="E-mail *" required="required" />
                                <p class="help-block text-danger" id="emailError"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control" id="passwd" type="password" name="passwd" placeholder="Hasło*" required="required" />
                                
                                <p class="help-block text-danger" id="passwdError"></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button class="btn btn-primary btn-xl text-uppercase" type="submit" value="Zarejestruj się">Zarejestruj się</button>
                        <button class="btn btn-link"  onclick="goToLogin()" >Wróć</button>
                    </div>
                </form>
            </div>
        </section>
        <script src="../js/login.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <script src="../js/lightbox.js"></script>
        <!--<script src="https://maps.google.com/maps/api/js?sensor=false" ></script>-->
        <script src="../js/login.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </body>
</html>


<?php
    function walidacja(){
        $args = [   'fName' => ['filter' => FILTER_VALIDATE_REGEXP,
                        'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
                    'lastName' => ['filter' => FILTER_VALIDATE_REGEXP,
                        'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,30}.*[\s]*$/']],
                    'email' => ['filter' => FILTER_VALIDATE_EMAIL],
                    'passwd' =>['filter' => FILTER_VALIDATE_REGEXP,
                        'options' => ['regexp' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/']]
                    
                ];
        
        
        $dane = filter_input_array(INPUT_POST, $args);
        
       
        $errors = "";
        foreach ($dane as $key => $val) {
            if ($val === false or $val === NULL) {
                $errors .= $key . " ";
            }
        }
        //haszowanie hasła
        $passwd = $dane['passwd'];
        
        $passwd_hashed = password_hash($passwd,PASSWORD_DEFAULT);
        $dane['passwd'] = $passwd_hashed;
        

        if ($errors === "") {
            
            return $dane;
        } else {
            echo "<p>Błędne dane:$errors</p>";
            ?><h2 style="color:white;" > Błędne dane: <?php $errors ?> </h2><?php
            return false;
        }
        
    }
    function dodajDoDB($db){
        
        if($dane = walidacja()){
            
            $pola = ['fName','lastName','email','passwd'];
            $val = "'NULL',";
            
            foreach($pola as $p){
                $val .= "'".$dane[$p]."',";
            }
            $val = rtrim($val,',');
            $email = $dane['email'];
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = $db -> getUserId($sql);
            if($db->getUserId($sql) === NULL){
                $sql = "INSERT INTO users (id, fName, lastName, email, passwd) VALUES ($val)";
                if($db -> insert($sql)){
                    ?><h2 style="color:white;" > Rejestracja przebiegła pomyślnie</h2><?php
                    
                    
                }else{
                    
                    ?><h2 style="color:white;" > Rejestracja nie powiodła się!</h2><?php
                }
            }else{
                    ?><h2 style="color:white;" > Uzytkownik o tym adresie email juz istnieje!</h2><?php
            }
        }
    }

   

    include_once '../class/Baza.php';
    $db = new Baza("localhost","root","","users");
    if($_POST){
        dodajDoDB($db);
    }
    //walidacja();
    //dodajDoBD($db); <button class="btn btn-primary btn-xl text-uppercase" type="submit" name="submit">Zarejestruj się</button></br>
    
?>