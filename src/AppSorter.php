<?php
declare(strict_types=1);

namespace TripSorter;


use TripSorter\CardsList\CardsListInterface;
use TripSorter\CardsList\InputCardsList;
use TripSorter\CardsList\ResultCardsList;

final class AppSorter implements SorterInterface
{
    public function sort(InputCardsList $cardsList) : CardsListInterface
    {
        $startPoint = $cardsList->getStartPoint();
        $result = new ResultCardsList();
        $boardingCards = $cardsList->getCards();
        for($i = 0; $i < sizeof($boardingCards); $i++) {
            $trip = $cardsList->findByDeparture($startPoint);
            if ($trip) {
                $result->addCard($trip);
                $startPoint = $trip->getArrival();
            }
        }

        return $result;
    }
}