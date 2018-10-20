<?php
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