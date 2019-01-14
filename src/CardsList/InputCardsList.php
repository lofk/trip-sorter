<?php
declare(strict_types=1);

namespace TripSorter\CardsList;

use TripSorter\Cards\CardInterface;
use TripSorter\Exception\BrokenChainException;

/**
 * Class InputCardsList
 * @package TripSorter\CardsList
 */
class InputCardsList extends CardsList
{
    /**
     * @return array
     */
    public function getDepartures() : array
    {
        return array_map(function (CardInterface $card) : string {
            return $card->getDeparture();
        }, $this->getCards());
    }

    /**
     * @return array
     */
    public function getArrivals() : array
    {
        return array_map(function (CardInterface $card) : string {
            return $card->getArrival();
        }, $this->getCards());
    }

    /**
     * @return string
     * @throws BrokenChainException
     */
    public function getStartPoint() : string
    {
        $departures = $this->getDepartures();
        $arrivals = $this->getArrivals();

        //diff between the list of departures and arrivals to determine the start point
        $startPoint = array_diff($departures, $arrivals);
        if (count($startPoint) !== 1) {
            //We should get only one starting point,
            //otherwise something is wrong in the cards chain
            throw new BrokenChainException();
        }

        return current($startPoint);
    }

    /**
     * @param string $departure
     * @return null|CardInterface
     */
    public function findByDeparture(string $departure) : ?CardInterface
    {
        $card = array_filter($this->getCards(), function(CardInterface $card) use ($departure) : bool {
            return $card->getDeparture() === $departure;
        });

        return empty($card) ? null : current($card);
    }
}