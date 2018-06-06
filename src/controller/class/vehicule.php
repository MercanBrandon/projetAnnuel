<?php
//
/**
 *
 */


class Vehicule
{
    protected $id_vehicule;
    protected $marque;
    protected $immatriculation;
    protected $modele;
    protected $dsn = 'mysql:dbname=dbtransportme;host=127.0.0.1';
    protected $dbh;
    
    
    function __construct(PDO $dbh, $email, $sPassword)
    {
    $stmt = $dbh->prepare("SELECT * from Vehicule");
    $stmt ->execute();
    $object = $stmt->fetchObject();
    $this->id_vehicule = $object->id_vehicule;
    $this->marque = $object->marque;
    $this->immatriculation = $object->immatriculation;
    $this->modele = $object->modele;
    $this->dbh = $dbh;

    }


    public function getVehicule(){
        return $this->marque;
    }

    //Insertion de vehicule
    public function addVehicule($marque, $immatriculation, $modele){
        $sql = "INSERT INTO Vehicule(marque, immatriculation, modele) VALUES ('$marque', '$immatriculation', '$modele')";
        $this->dbh->query($sql);
    }
    
    //Suppression de vehicule 
    public function deleteVehicule(){
        $sql = "DELETE FROM Vehicule where id_vehicule = '$id_vehicule'"
        $this->dbh->query($sql);
    }
    
    
    //Modification de vehicule 
    public function deleteVehicule(){
        $sql = "UPDATE Vehicule SET(".$marque.",".$immatriculation.",".$modele") where id_vehicule = ".$id_vehicule;
        $this->dbh->query($sql);
    }
    
    
    
}

 ?>
