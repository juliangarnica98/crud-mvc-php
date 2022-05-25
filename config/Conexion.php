<?php
    class Conexion{
        public static function conectar(){
            $con=new PDO("mysql: host=localhost; dbname=proyecto; charset=utf8","root","");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        }
    }
?>