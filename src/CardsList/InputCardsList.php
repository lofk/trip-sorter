<?php
declare(strict_types=1);

namespace TripSorter\CardsList;


use TripSorter\Cards\BoardingCard;
use TripSorter\Exception\BrokenChainException;

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
        $startPoint = array_diff($departures, $arrivals);
        if (count($startPoint) !== 1) {
            throw new BrokenChainException();
        }

        return current($startPoint);
    }

    public function findByDeparture(string $departure) : BoardingCard
    {
        $card = array_filter($this->getCards(), function(BoardingCard $card) use ($departure) : bool {
            return $card->getDeparture() === $departure;
        });

        return empty($card) ? null : current($card);
    }
}