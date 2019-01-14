<?php
declare(strict_types=1);

namespace TripSorter\Cards;


final class FlightBaggage
{
    /**
     * @var string
     */
    protected $counter;

    /**
     * @return string
     */
    public function getCounter() : string
    {
        return $this->counter;
    }

    /**
     * @param string $counter
     */
    public function setCounter(string $counter) : void
    {
        $this->counter = $counter;
    }

    public function getDescription() : string
    {
        return $this->getCounter() ?
            "Baggage drop at ticket counter {$this->getCounter()}" :
            'Baggage will be automatically transferred from your last leg.';
    }
}