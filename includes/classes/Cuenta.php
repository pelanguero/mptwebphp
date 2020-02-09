<?php
class Cuenta
{
    private $errorArray;
    private $scon;
    public function __construct($scon)
    {
        $this->scon = $scon;
        $this->errorArray = array();
    }

    public function register($un, $fn, $ln, $pw, $pw2, $em, $em2)
    {
        $this->validarapellido($ln);
        $this->validarmail($em, $em2);
        $this->validarUN($un);
        $this->validarpass($pw, $pw2);
        $this->validarname($fn);

        if (empty($this->errorArray)) {
            //insertar en la base de datos
            return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
        } else {
            return false;
        }
    }

    private function insertUserDetails($un, $fn, $ln, $em, $pw)
    {
        $encryppw = md5($pw);
        $profilepic = "assets/images/profile-pics/head_emerald.png";
        $date = date("Y-m-d");
        echo "INSERT INTO usuarios VALUES ('0','$un','$fn','$ln','$em','$encryppw','$date','$profilepic')";
        $result = mysqli_query($this->scon, "INSERT INTO usuarios VALUES ('','$un','$fn','$ln','$em','$encryppw','$date','$profilepic')");
        echo $result;
        return $result;
    }

    public function darerror($error)
    {
        if (!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    private function validarUN($vun)
    {
        if (strlen($vun) > 25 || strlen($vun) < 5) {
            array_push($this->errorArray, Constantes::$unlen);
            return;
        }
        //TODO:verificar si el usuario existe
    }
    private function validarname($vn)
    {
        if (strlen($vn) > 25 || strlen($vn) < 2) {
            array_push($this->errorArray, Constantes::$nalen);

            return;
        }
    }
    private function validarmail($vm, $vm2)
    {
        if ($vm != $vm2) {
            array_push($this->errorArray, Constantes::$emdm);
            return;
        }
        if (!filter_var($vm, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constantes::$emnv);
            return;
        }

        //TODO VERIFICAR SI el email ya esta en uso
    }
    private function validarapellido($va)
    {
        if (strlen($va) > 25 || strlen($va) < 2) {
            array_push($this->errorArray, Constantes::$apelen);
            return;
        }
    }
    private function validarpass($vp, $vp2)
    {
        if ($vp != $vp2) {
            array_push($this->errorArray, Constantes::$passdm);
            return;
        }
        if (preg_match('/[^A-Za-z0-9]/', $vp)) {
            array_push($this->errorArray, Constantes::$passcon);
            return;
        }

        if (strlen($vp) > 30 || strlen($vp) < 5) {
            array_push($this->errorArray, Constantes::$passlen);
            return;
        }
    }
}
