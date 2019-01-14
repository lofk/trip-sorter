<?php
declare(strict_types=1);

namespace TripSorter\CardsList;


use TripSorter\Cards\BoardingCard;

class InputCardsList extends CardsList
{
    public function getDepartures() : array
    {
        return array_map(function (BoardingCard $card) {
            return $card->getDeparture();
        }, $this->getCards());
    }

    public function getArrivals() : array
    {
        return array_map(function (BoardingCard $card) {
            return $card->getArrival();
        }, $this->getCards());
    }

    public function getStartPoint() : string
    {
        $departures = $this->getDepartures();
        $arrivals = $this->getArrivals();

        //diff between the list of departures and arrivals
        //will return the start point
        return current(array_diff($departures, $arrivals));
    }
}