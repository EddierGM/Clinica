<?php

require ("config.php");

class Conexion {

   protected $link;


   public function Conexion (){

      try{

     //$this->link = new PDO("mysql:host=localhost; dbname=pruebas", "tayron", "GotYouBitch_95");
     $this->link = new PDO("mysql:host=". HOST."; dbname=". DB, USER, PASS);
     $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
     return $this->link;

      }catch(PDOException $e){

     die("Error: ". $e->getMessage(). "<br> Line: ". $e->getLine(). "<br> Code: ". $e->getCode());
      }
   
   }
}
