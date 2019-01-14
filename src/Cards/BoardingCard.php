<?php
declare(strict_types=1);

namespace TripSorter\Cards;


abstract class BoardingCard implements CardInterface
{
    /**
     * @var string
     */
    protected $refNumber;

    /**
     * @var string
     */
    protected $departure;

    /**
     * @var string
     */
    protected $arrival;

    /**
     * @return string
     */
    public function getRefNumber() : string
    {
        return $this->refNumber;
    }

    /**
     * @param string $refNumber
     */
    public function setRefNumber(string $refNumber) : void
    {
        $this->refNumber = $refNumber;
    }

    /**
     * @return string
     */
    public function getDeparture() : string
    {
        return $this->departure;
    }

    /**
     * @param string $departure
     */
    public function setDeparture(string $departure) : void
    {
        $this->departure = $departure;
    }

    /**
     * @return string
     */
    public function getArrival() : string
    {
        return $this->arrival;
    }

    /**
     * @param string $arrival
     */
    public function setArrival(string $arrival) : void
    {
        $this->arrival = $arrival;
    }

    /**
     * @return string
     */
    abstract public function getDescription() : string;
}