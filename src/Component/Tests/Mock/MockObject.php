<?php

/**
 * User: holoflins
 * Date: 27/09/2015
 * Time: 20:39
 */


namespace Component\Tests\Mock;

class MockObject
{
    /**
     * @var string
     */
    private $string;

    /**
     * @var integer
     */
    private $integer;

    /**
     * @var array
     */
    private $array;

    /**
     * @var \DateTime
     */
    private $dateTime;

    public function __construct(){
        $this->string = 'string';
        $this->integer = 42;
        $this->array = array('key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3');
        $this->dateTime = new \DateTime();
    }

    /**
     * @return string
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * @return integer
     */
    public function getInteger()
    {
        return $this->integer;
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return $this->array;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }
}
