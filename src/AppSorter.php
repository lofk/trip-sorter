<?php
declare(strict_types=1);

namespace TripSorter;

use TripSorter\CardsList\{CardsListInterface, ResultCardsList};

/**
 * Class AppSorter
 * @package TripSorter
 */
final class AppSorter implements SorterInterface
{
    /**
     * This method sorts any objects implementing a CardListInterface,
     * by finding the start point, then build a ResultCardsList object with the continuous order of the cards.
     *
     * @param CardsListInterface $cardsList
     * @return CardsListInterface
     * @throws Exception\BrokenChainException
     */
    public function sort(CardsListInterface $cardsList) : CardsListInterface
    {
        $startPoint = $cardsList->getStartPoint();
        $result = new ResultCardsList();
        do {
            $card = $cardsList->findByDeparture($startPoint);
            if ($card) {
                $result->addCard($card);
                $startPoint = $card->getArrival();
            }
        } while ($card);

        return $result;
    }
}