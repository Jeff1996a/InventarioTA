<?php


class Tecnico
{
    public $id_tecnico;
    public $tecnico;
    public $email;

    function __construct()
    {
        $this-> id_tecnico = 0;
        $this-> tecnico = "";
        $this-> email = "";
    }
}