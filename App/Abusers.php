<?php
 abstract class  Abusers 
{
private $id;
private $nom;
private $email;
private $pword;
private $errors = array();

// Constructeur
public function  __construct(array  $data)
{
      $this->hydrate($data);
      $this->setErrors($data);
}

 
  // Liste des getters
  
  public function id()
  {
    return $this->id;
  }
  
  public function nom()
  {
    return $this->nom;
  }

  public function email()
  {
    return $this->email;
  }
  
  public function pword()
  {
    return $this->pword;
  }
  
  
public function errors()
{
     return $this->errors;
}

  // Liste des setters
  
  public function setId($id)
  {
              // On convertit l'argument en nombre entier.
              // Si c'en était déjà un, rien ne changera.
              // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).
              $id = (int) $id;
              
              // On vérifie ensuite si ce nombre est bien strictement positif.
              if ($id > 0)
              {
                // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
                $this->id = $id;
              }
  }
  
  public function setNom($nom)
  {
            // On vérifie qu'il s'agit bien d'une chaîne de caractères.
            if (is_string($nom))
            {
              $this->nom = $nom;
            }
  } 

  public function setEmail($email)
  {
              // On vérifie qu'il s'agit bien d'une chaîne de caractères.
              if (is_string($email))
              {
                $this->email = $email;
              }
  } 

  public function setPword($pass)
  {
              // On vérifie qu'il s'agit bien d'une chaîne de caractères.
              if (is_string($pass))
              {
                $this->pword = $pass;
              }
  } 

  public function setErrors(array $data)
  {
        $this->errors = $data;
  }


  // ............................................................…
public function hydrate(array $donnees)
{
            foreach ($donnees as $key => $value)
            {
              // On récupère le nom du setter correspondant à l'attribut.
              $method = 'set'.ucfirst($key);
                  
              // Si le setter correspondant existe.
              if (method_exists($this, $method))
              {
                // On appelle le setter.
                $this->$method($value);
              }
            }
}
// …....

// ......................toString
public function  __toString()
{
            try 
            {
                return 'Id: '.(string) $this->id().'<br/> Nom: '.(string) $this->nom().'<br/> Email: '.(string) $this->email().'<br/> Password: '.(string) $this->password();
            } 
            catch (Exception $exception) 
            {
                return '';
            }
}
// ......................


// ......................
//est vide  ?
public function estVide()
{
                if(empty($this->nom()) or empty($this->email()) or empty($this->pword()))
                  {
                        return true;
                  }else return false;
}
// ......................

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

}  //Fin de classe



 