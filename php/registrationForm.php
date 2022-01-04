<?php
class RegistrationForm{
    protected $user;
    function __construct(){?>
    <html>
        <form action="login.php" method="POST">
            Nazwa użytkownika: <br/><input name="userName" /><br/>
            Imie i nazwisko: <br/><input name="fullName" /><br/>
            Hasło: <br/><input name="passwd" placeholder="8 znaków, liczba, znak specjany" /><br/>
            Email: <br/><input name="email"/>
            <input type='submit' name='submit' value='Rejestruj'/>
            <input type='reset' name='reset' value='Anuluj'/>
            
        </form></p>
    </html>
    <?php
    }
    function checkUser(){ 
        $args = ['userName' => ['filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
                'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,30}.*[\s]*$/']],
                'passwd' =>['filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/']],
                'email' => ['filter' => FILTER_VALIDATE_EMAIL]
                
            
           
        ];
        //przefiltruj dane:
        $dane = filter_input_array(INPUT_POST, $args);
        $errors = "";
        foreach ($dane as $key => $val) {
            if ($val === false or $val === NULL) {
                $errors .= $key . " ";
            }
        }

        if ($errors === "") {
                
                 $this->user=new User($dane['userName'], $dane['fullName'],
                $dane['email'],$dane['passwd']);
        } else {
            echo "<p>Błędne dane:$errors</p>";
            $this->user = NULL;
        }
        return $this->user;
     }
}