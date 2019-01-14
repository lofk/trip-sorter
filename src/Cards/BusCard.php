<?php
declare(strict_types=1);

namespace TripSorter\Cards;


final class BusCard extends BoardingCard
{
    /**
     * @return string
     */
    public function getDescription() : string
    {
        return "Take the bus {$this->getRefNumber()} from {$this->getDeparture()} to {$this->getArrival()}. No seat Assignment.";
    }
}