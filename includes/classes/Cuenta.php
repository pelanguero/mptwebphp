<?php
class Cuenta
{
    private $errorArray;

    public function __construct()
    {
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
            return true;
        } else {
            return false;
        }
    }

    private function validarUN($vun)
    {
        if (strlen($vun) > 25 || strlen($vun) < 5) {
            array_push($this->errorArray, "El nombre de usuario debe tener entre 5 y 25 caracteres");
            return;
        }
        //TODO:verificar si el usuario existe
    }
    private function validarname($vn)
    {
        if (strlen($vn) > 25 || strlen($vn) < 2) {
            array_push($this->errorArray, "El nombre de  debe tener entre 2 y 25 caracteres");

            return;
        }
    }
    private function validarmail($vm, $vm2)
    {
        if ($vm != $vm2) {
            array_push($this->errorArray, "La direccion de correo no coincide");
            return;
        }
        if (!filter_var($vm, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, "La direccion de correo no es valida");
            return;
        }

        //TODO VERIFICAR SI el email ya esta en uso
    }
    private function validarapellido($va)
    {
        if (strlen($va) > 25 || strlen($va) < 2) {
            array_push($this->errorArray, "El apellido debe tener entre 2");
            return;
        }
    }
    private function validarpass($vp, $vp2)
    {
        if ($vp != $vp2) {
            array_push($this->errorArray, "La contraseña no coincide");
            return;
        }
        if (preg_match('/[^A-Za-z0-9]/', $vp)) {
            array_push($this->errorArray, "La contraseña solo puede contener numeros y letras");
            return;
        }

        if (strlen($vp) > 30 || strlen($vp) < 5) {
            array_push($this->errorArray, "La contraseña debe tener minimo 5 caracteres y maximo 30");
            return;
        }
    }
}
