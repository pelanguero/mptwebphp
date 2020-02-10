<?php
function trformpass($inputs)
{
    //quita las etiquetas del string parametro
    $inputs = strip_tags($inputs);
    return $inputs;
}

function trformdata($inputs)
{

    $inputs = strip_tags($inputs);
    //remplaza la primera string por la segunda  
    $inputs = str_replace(" ", "", $inputs);
    return $inputs;
}

function trformstr($inputs)
{
    $inputs = strip_tags($inputs);
    $inputs = str_replace(" ", "", $inputs);
    $inputs = ucfirst(strtolower($inputs));
    return $inputs;
}



if (isset($_POST['registerButton'])) {
    $username = trformdata($_POST['registerUsername']);

    $name = trformstr($_POST['registername']);

    $apellido = trformstr($_POST['registerApellido']);

    $email = trformstr($_POST['registerMail']);

    $email2 = trformstr($_POST['registerMail2']);

    $pass = trformpass($_POST['registerPassword']);

    $pass2 = trformpass($_POST['registerPassword2']);

    $exito = $cuenta->register($username, $name, $apellido, $pass, $pass2, $email, $email2);

    if ($exito) {
        $_SESSION['userLoggedIn']=$username;
        header("Location: index.php");
    }
}
