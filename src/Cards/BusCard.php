<?php
declare(strict_types=1);

namespace TripSorter\Cards;

/**
 * Class BusCard
 * @package TripSorter\Cards
 */
final class BusCard extends AbstractBoardingCard
{
    /**
     * @return string
     */
    public function getDescription() : string
    {
        return "Take the bus {$this->getRefNumber()} from {$this->getDeparture()} to {$this->getArrival()}. No seat Assignment.";
    }
}