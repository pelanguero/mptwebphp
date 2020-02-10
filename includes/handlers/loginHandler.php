<?php
if (isset($_POST['loginButton'])) {
    $username=$_POST['loginUsername'];
    $userpass=$_POST['loginPassword'];

    $resultado=$cuenta->login($username,$userpass);

    if($resultado){
        $_SESSION['userLoggedIn']=$username;
        header("Location: index.php");
    }
}
