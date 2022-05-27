<?php
// Vérifie qu'il provient d'un formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //identifiants mysql
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "Clinique";
// $conn = new mysqli("localhost", "root", "");
  // Vérifie qu'il provient d'un formulaire
  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Nom"]; 
    $lastname = $_POST["Prénom"];
    $phone = $_POST["Phone"];
    $adresse = $_POST["Adresse"];
    $types = $_POST["Type"];
    
    if (!isset($name)){
      die("S'il vous plaît entrez votre nom");
    }
    if (!isset($lastname)){
      die("S'il vous plaît entrez votre prénom");
    }
    if (!isset($phone)){
      die("S'il vous plaît entrez votre numéro");
    }

    if (!isset($adresse) ){
      die("S'il vous plaît entrez votre adresse");
    }
    if (!isset($types)){
      die("S'il vous plaît entrez votre type");
    }
    // print "Salut " . $name . $ "!, votre numéro de téléphone est ". $phone;
  // }
      //Ouvrir une nouvelle connexion au serveur MySQL
      $mysqli = new mysqli($host, $username, $password, $database);
      
      //Afficher toute erreur de connexion
      if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
      } else {
        echo "bonne conexxion";
      }
      //préparer la requête d'insertion SQL
      // $statement = $mysqli->prepare("INSERT INTO fournisseurs ($name, $lastname, $phone, $adresse, $types) VALUES(?, ?, ?, ?, ?)"); 
      $statement = $mysqli->prepare("INSERT INTO fournisseurs (nom, prénom, phone, adresse, types) VALUES('$name', '$lastname', '$phone', '$adresse', '$types')"); 
      //Associer les valeurs et exécuter la requête d'insertion
      //  $statement->bind_param( $name, $phone, $lastname, $adresse, $types); 
      
      if($statement->execute()){
        print "Salut " . $name . "!, votre prénom est ". $lastname;
      }else{
        print $mysqli->error; 
      }
    }
?>