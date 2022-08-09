<?php                                 
session_start(); // demarrer-na ilay session 
if(isset($_COOKIE['username'])) { // verifier-na hoe misy ve ilay cookie username
    echo 'Bienvenu(e) '.$_COOKIE['username'].' '.'<a href="logout.php">Log out</a>'; // raha misy dia afficher-na miaraka amin'ny lien de deconnexion
} else { 
    header('location: /login.php');
}

///header = fonction php manao redirection ////