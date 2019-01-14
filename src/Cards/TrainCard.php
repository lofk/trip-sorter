<?php
declare(strict_types=1);

namespace TripSorter\Cards;


final class TrainCard extends BoardingCard
{
    /**
     * @var  string
     */
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

    public function getDescription() : string
    {
        return "Take train {$this->getRefNumber()} from {$this->getDeparture()} to {$this->getArrival()}. Sit in seat {$this->getSeat()}.";
    }
}