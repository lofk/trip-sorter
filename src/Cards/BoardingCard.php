<?php
declare(strict_types=1);

namespace TripSorter\Cards;


abstract class BoardingCard
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
    public function getRefNumber()
    {
        return $this->refNumber;
    }

    /**
     * @param string $refNumber
     */
    public function setRefNumber($refNumber)
    {
        $this->refNumber = $refNumber;
    }

    /**
     * @return string
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @param string $departure
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
    }

    /**
     * @return string
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * @param string $arrival
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
    }
}