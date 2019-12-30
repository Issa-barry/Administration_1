<?php

class Connexion extends Abusers {
     
  
// Constructeur
      public function __construct(array $data)
      {
           parent::__construct($data);
      }


 //Redefinit de estVide  ?
public function estVide()
{
                if( empty($this->email()) or empty($this->pword()))
                  {
                        return true;
                  }else return false;
}


    // Redefinition de verification
public function  verification()
{
      
                    foreach ($this->errors() as $key => $value) 
                    {
                              if($key == "email" and empty($value))
                              {
                                   echo "<p  class='errors'> * Veuillez saire votre email </p>";
                              }
                              if($key == "pword" and empty($value))
                              {
                                   echo  "<p  class='errors'> * Veuillez saisire votre mot de passe </p>";
                              }
                              echo '<br/>';
                    }  
          
}
    
}