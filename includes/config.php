<?php
ob_start();

$timezone = date_default_timezone_set("America/Bogota");

$scon = mysqli_connect("localhost", "root", "mysql", "brutalfy");

if (mysqli_connect_error()) {
    echo "Fallo al conectar:" . mysqli_connect_error();
}
