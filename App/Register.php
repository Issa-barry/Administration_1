<?php
require_once('Abusers.php');

class Register  {
    private $db;
// Constructeur
      public function __construct()
      {
           $this->setDb();
      }

 // Liste des getters
 public function db()
 {
   return $this->db;
 }
 
   // Liste des setters
   public function setDb()
   {
        $this->db = new Database();
   }
   

    
}