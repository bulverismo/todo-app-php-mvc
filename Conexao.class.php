<?php
class Conexao {
    public static function conectar(){
        $options = array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $con = new PDO("mysql:host=localhost;dbname=database.name","user","pass",$options);
        return $con;
    }
}
?>
