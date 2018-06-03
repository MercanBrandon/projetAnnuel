<?php
require 'Adress.php';
/**
 *
 */
class AdressManager
{
  private $_db;
  function __construct($db)
  {
    $this->setDb($db);
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }

  public function adrLisByUsrID($id)
  {
    $q = $this->_db->prepare("SELECT adr.adr_id, adr.adr_libelle, adr.adr_ligne1, adr.adr_ligne2, adr.adr_PC, adr.adr_city_lib FROM adress adr INNER JOIN usedby ON adr.adr_id = usedby.adr_id WHERE usedby.usr_id = '$id'");
    $q->execute();
    $aAdress = $q->fetchAll(PDO::FETCH_ASSOC);
    return $aAdress;
  }

  public function showAdress(Adress $adress)
  {
    printf('<p>'.$adress->getAdr_libelle().'<br/>'.$adress->getAdr_ligne1().'<br/>'.$adress->getAdr_ligne2().'<br/>'.$adress->getAdr_PC().'<br/>'.$adress->getAdr_city_lib().'</p>');
  }
}

 ?>
