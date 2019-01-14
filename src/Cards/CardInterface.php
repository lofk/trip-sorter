<?php
declare(strict_types=1);

namespace TripSorter\Cards;


interface CardInterface
{
    /**
     * @return string
     */
    public function getRefNumber() : string;

    /**
     * @param string $refNumber
     */
    public function setRefNumber(string $refNumber) : void;

    /**
     * @return string
     */
    public function getDeparture() : string;

    /**
     * @param string $departure
     */
    public function setDeparture(string $departure) : void;

    /**
     * @return string
     */
    public function getArrival() : string;

    /**
     * @param string $arrival
     */
    public function setArrival(string $arrival) : void;

    /**
     * @return string
     */
    public function getDescription() : string;
}