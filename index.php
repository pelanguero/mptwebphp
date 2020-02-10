
<?php
include("includes/config.php");

if(isset($_SESSION['userLoggedIn'])){
    $userLoggedIn=$_SESSION['userLoggedIn'];
}
else{
    header("Location:registro.php");
}
?>

<html>
<head>
<title>Bienvenido a Musica para todos</title>
</head>
<body>
    hello
</body>
</html>
