<?php

namespace TripSorter\Cards;


final class FlightCard extends BoardingCard
{
    /** @var  string */
    protected $gate;

    /** @var  string */
    protected $seat;

    /**
     * @return string
     */
    public function getGate()
    {
        return $this->gate;
    }

    /**
     * @param string $gate
     */
    public function setGate($gate)
    {
        $this->gate = $gate;
    }

    /**
     * @return string
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param string $seat
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
    }
}