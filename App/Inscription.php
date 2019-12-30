<?php

class Inscription extends Abusers {
     private $errors = array();
  
// Constructeur
      public function __construct(array $data)
      {
           parent::__construct($data);
           $this->setErrors($data);
      }

public function errors()
{
     return $this->errors;
}

// Set Errors
public function setErrors(array $data)
{
    $this->errors = $data;
}
//est vide  ?
public function estVide()
{
     if(empty($this->nom()) or empty($this->email()) or empty($this->pword()))
       {
            return true;
       }else return false;
}


// Verification
public function  verification()
{
      
                    foreach ($this->errors() as $key => $value) 
                    {
                              if($key == "nom" and empty($value))
                              {
                                   echo "<p  class='errors'> * Veuillez saire votre nom </p>";
                              }
                              if($key == "email" and empty($value))
                              {
                                   echo "<p  class='errors'> * Veuillez saire votre email </p>";
                              }
                              if($key == "pword" and empty($value))
                              {
                                   echo  "<p  class='errors'> * Veuillez choisir un mot de passe </p>";
                              }
                              echo '<br/>';
                    }  
          
}
 
 
}