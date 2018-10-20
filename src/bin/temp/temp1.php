<?php
/**
 * Created by PhpStorm.
 * User: arino
 * Date: 20/10/2018
 * Time: 12:16
 */

class temp1
{
    private $temp1_id;
    private $temp1_course;

    /**
     * @return mixed
     */
    public function getTemp1Id()
    {
        return $this->temp1_id;
    }

    /**
     * @return mixed
     */
    public function getTemp1Course()
    {
        return $this->temp1_course;
    }

    /**
     * @param mixed $temp1_course
     */
    public function setTemp1Course($temp1_course)
    {
        $this->temp1_course = $temp1_course;
    }


}