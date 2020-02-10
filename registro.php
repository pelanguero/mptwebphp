<?php
include("includes/config.php");
include("includes/classes/Cuenta.php");
include("includes/classes/Constantes.php");
$cuenta = new Cuenta($scon);


include("includes/handlers/registerHandler.php");
include("includes/handlers/loginHandler.php");

function darInput($nname)
{
    if (isset($_POST[$nname])) {
        echo $_POST[$nname];
    }
}
?>
<html>

<head>
    <title>
        Bienvenido a mpt
    </title>
</head>

<body>
    <div id="inputContainer">
        <form id="loginForm" action="registro.php" method="post">
            <h2>Login to your account</h2>
            <p>
            <?php echo $cuenta->darerror(Constantes::$logerror); ?>
                <label for="loginUsername">Usuario</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="ejemplo pelanguero" required>
            </p>
            <p>
                <label for="loginPassword">Contraseña</label>
                <input id="loginPassword" name="loginPassword" type="password" required>
            </p>
            <button type="submit" name="loginButton">log in</button>
        </form>


        <form id="registerForm" action="registro.php" method="post">
            <h2>Crea tu cuenta gratis</h2>
            <p>
                <?php echo $cuenta->darerror(Constantes::$unlen); ?>
                <?php echo $cuenta->darerror(Constantes::$unext); ?>
                <label for="registerUsername">Usuario</label>
                <input id="registerUsername" name="registerUsername" type="text" placeholder="ejemplo pelanguero" value="<?php darInput("registerUsername") ?>" required>
            </p>

            <p>
                <?php echo $cuenta->darerror(Constantes::$nalen); ?>
                <label for="registername">Nombre</label>
                <input id="registername" name="registername" type="text" placeholder="ejemplo juan" value="<?php darInput("registername") ?>" required>
            </p>

            <p>
                <?php echo $cuenta->darerror(Constantes::$apelen); ?>
                <label for="registerApellido">Apellido</label>
                <input id="registerApellido" name="registerApellido" type="text" placeholder="ejemplo gonzalez" value="<?php darInput("registerApellido") ?>" required>
            </p>

            <p>
                <?php echo $cuenta->darerror(Constantes::$emnv); ?>
                <?php echo $cuenta->darerror(Constantes::$mailext); ?>
                <label for="registerMail">e-mail</label>
                <input id="registerMail" name="registerMail" type="email" placeholder="ejemplo pelanguero@pelanguero.com" value="<?php darInput("registerMail") ?>" required>
            </p>

            <p>
                <?php echo $cuenta->darerror(Constantes::$emdm); ?>
                <label for="registerMail2">re e-mail</label>
                <input id="registerMail2" name="registerMail2" type="email" placeholder="ejemplo pelanguero@pelanguero.com" value="<?php darInput("registerMail2") ?>" required>
            </p>



            <p>
                <?php echo $cuenta->darerror(Constantes::$passcon); ?>
                <?php echo $cuenta->darerror(Constantes::$passlen); ?>
                <label for="registerPassword">Contraseña</label>
                <input id="registerPassword" name="registerPassword" type="password" required>
            </p>

            <p>
                <?php echo $cuenta->darerror(Constantes::$passdm); ?>
                <label for="registerPassword2">re Contraseña</label>
                <input id="registerPassword2" name="registerPassword2" type="password" required>
            </p>
            <button type="submit" name="registerButton">Registrate</button>
        </form>
    </div>
</body>

</html>