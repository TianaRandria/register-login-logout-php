<?php

function connect() {
    try {
        $db = new PDO('mysql:host=localhost;dbname=defiphp', 'root', ''); 
        echo 'connected';
        return $db;
        }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

function register() {
    $pass = password_hash($_POST['password'],  PASSWORD_DEFAULT);
    $login = $_POST['username'];
    $name = $_POST['name'];

    $ajouter = connect()->prepare('INSERT INTO user (login_user, password_user,name_user ) VALUES (:login_user, :password_user, :name_user)');
    $ajouter->bindParam(':login_user', $login, 
    PDO::PARAM_STR);
    $ajouter->bindParam(':password_user', $pass,  
    PDO::PARAM_STR);
    $ajouter->bindParam(':name_user', $name,  
    PDO::PARAM_STR);
    $estceok = $ajouter->execute();
    $ajouter->debugDumpParams();

    if($estceok){
        header('Location: ./index.php');   
    } else {
        echo 'Error during registration';
    }
}

function login() {
    $findUser = connect()->prepare('SELECT * FROM user WHERE login_user = :login_user');
    $findUser->bindParam(':login_user', $_POST['username'], PDO::PARAM_STR);
    $findUser->execute();
    $user = $findUser->fetch();
 
    //$user && password_verify($_POST['password'], $user['password_user'])
    //le mot de passe est alex
    //$user && password_verify(alex, $2y$10$6BcBM4oinhbyHIL09w.j/eIFwYkCc499VDIZIy7LJ1PRU4GO2ynQS])
    if ($user && password_verify($_POST['password'], $user['password_user'])) {
        echo "Valid username and password";
        // var_dump($user); //var_dump ohatrany console log //
        $name_user = $user['name_user'];
        setcookie('username', $name_user); //setcookie dia mistocké an'ilay nom d'utilisateur mandritrany session//
        header('Location: /index.php');
    } else {
        echo 'Invalid username or password';
    }
}

if(isset($_POST['action']) && !empty($_POST['username'])  && !empty($_POST['password'])  && $_POST['action']=="register") {
    register();
}

if(isset($_POST['action']) && !empty($_POST['username'])  && !empty($_POST['password'])  && $_POST['action']=="login") {
    login();
}
