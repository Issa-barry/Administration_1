
<?php

class Database {
  
    private $bdd;

    public function __construct()
    {
        $this->setBdd();
    }

// Getters
     public function  bdd() {  return $this->bdd; }

 //  Setters

    public function setBdd()
    {
        //  $this->_bdd = new PDO('mysql:host=localhost;dbname=poo', 'root', '');
         try{
            $this->bdd  = new pdo('mysql:host=localhost;port=3306;dbname=galerie;charset=utf8','root','',array(
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       ));
       }catch(PDOException $pe){
           echo $pe->getMessage();
       }
    }


// Lecteur de la base de données

public function selection()
{
                $persos = [];

                $req = $this->bdd()->query('SELECT id, nom,email,pword FROM users ORDER BY id limit 1');

                while ($data = $req->fetch(PDO::FETCH_ASSOC))
                {
                   $persos[] = new Inscription($data);
                }

                return $persos;
}

// Lecteur de la base de données

public function authentification($email, $mdp)
{
                
                $req = $this->bdd()->query("SELECT email,pword FROM users where email='$email'  and pword='$mdp' " );
                $reponse =  $req->fetch(PDO::FETCH_ASSOC);
                return $reponse;
}
// Insrer des données

public function addUser(Inscription $perso)
{
  $req = $this->bdd()->prepare('INSERT INTO users(nom,email,pword) VALUES(:N, :E, :P)');

  $req->bindValue(':N', $perso->nom());
  $req->bindValue(':E', $perso->email(), PDO::PARAM_INT);
  $req->bindValue(':P', $perso->pword(), PDO::PARAM_INT);

  $req->execute();
 
}
        
}