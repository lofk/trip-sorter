<?php
declare(strict_types=1);

namespace TripSorter\Cards;


final class FlightCard extends BoardingCard
{
    /**
     * @var  string
     */
    protected $gate;

    /**
     * @var  string
     */
    protected $seat;

    /**
     * @var  FlightBaggage
     */
    protected $baggage;

    /**
     * @return string
     */
    public function getGate() : string
    {
        return $this->gate;
    }

    /**
     * @param string $gate
     */
    public function setGate($gate) : void
    {
        $this->gate = $gate;
    }

    /**
     * @return string
     */
    public function getSeat() : string
    {
        return $this->seat;
    }

    /**
     * @param string $seat
     */
    public function setSeat($seat) : void
    {
        $this->seat = $seat;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return "From {$this->getDeparture()}, take flight {$this->getRefNumber()} to {$this->getArrival()}. Gate {$this->getGate()}, seat {$this->getSeat()}.";
    }

    /**
     * @return FlightBaggage
     */
    public function getBaggage()
    {
        return $this->baggage;
    }

    /**
     * @param FlightBaggage $baggage
     */
    public function setBaggage($baggage)
    {
        $this->baggage = $baggage;
    }
}