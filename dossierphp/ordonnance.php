<?php
// Vérifie qu'il provient d'un formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //identifiants mysql
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "clinique";
// $conn = new mysqli("localhost", "root", "");
  // Vérifie qu'il provient d'un formulaire
  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mesure = $_POST["Types"];
    $médicament = $_POST["Médicament"];
    $number = $_POST["Numéro"]; 
    $date = $_POST["Dates"];
    
    if (!isset($mesure)){
        die("S'il vous plaît entrez les Types");
      }
      if (!isset($médicament)){
        die("S'il vous plaît entrez le Médicament");
      }
    if (!isset($number)){
      die("S'il vous plaît entrez votre Numéro");
    }
    if (!isset($date)){
      die("S'il vous plaît entrez Dates");
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
      // $statement = $mysqli->prepare("INSERT INTO ordonnance ($mesure, $médicament, $number, $date) VALUES(?, ?, ?, ?)"); 
      $statement = $mysqli->prepare("INSERT INTO ordonnance (Types, Médicament, Numéro, Dates) VALUES('$mesure', '$médicament','$number', '$date')"); 
      //Associer les valeurs et exécuter la requête d'insertion
      //  $statement->bind_param( $name, $phone, $lastname, $adresse, $types); 
     
      if($statement->execute()){
        print "Salut " . $number . "!, votre Médicament est ". $médicament;
      }else{
        print $mysqli->error; 
      }
    }
?>