<?php

class Conexao {
    private static $instance;

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new PDO("mysql:host=localhost;dbname=sistema_academia", "root", "");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }
}


?>