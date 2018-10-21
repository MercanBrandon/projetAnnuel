<?php

/*
quand on cree la course en session on doit passer un tablau d'id de chauffeur 
qu'il a trouver comme sa temp2 cré des relation entre chaque chauffeur et la course en session
car tous les chauffeur on une demande pour cette coure et il peuvent accepter ou refuser 
en se faisant il passe le status soit en valider soit en refuser et cela suprime la relation entre le chauffeur et la course en question

Quand tu apelle l'api de validation on peux mettre false et cela veux die que la course a deja ete accepter par quelqu'un d'autre : il va choisir tous les chauffeur das les environ mai si un chauffeur a ete plus rapide que lui c'est tampis pour lui!

*/

/**
 * Created by PhpStorm.
 * User: arino
 * Date: 20/10/2018
 * Time: 14:44
 */

class temp2
{
    private $temp2_id;
    private $temp1_id;
    private $driver_id;
    private $temp2_status;

    /**
     * @return mixed
     */
    public function getTemp2Id()
    {
        return $this->temp2_id;
    }

    /**
     * @return mixed
     */
    public function getTemp1Id()
    {
        return $this->temp1_id;
    }

    /**
     * @param mixed $temp1_id
     */
    public function setTemp1Id($temp1_id)
    {
        $this->temp1_id = $temp1_id;
    }

    /**
     * @return mixed
     */
    public function getDriverId()
    {
        return $this->driver_id;
    }

    /**
     * @param mixed $driver_id
     */
    public function setDriverId($driver_id)
    {
        $this->driver_id = $driver_id;
    }

    /**
     * @return mixed
     */
    public function getTemp2Status()
    {
        return $this->temp2_status;
    }

    /**
     * @param mixed $temp2_status
     */
    public function setTemp2Status($temp2_status)
    {
        $this->temp2_status = $temp2_status;
    }
}