<?php

namespace TripSorter\Cards;


final class TrainCard extends BoardingCard
{
    /** @var  string */
    protected $seat;

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