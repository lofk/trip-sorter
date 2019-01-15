<?php
declare(strict_types=1);

namespace TripSorter;

use TripSorter\CardsList\CardsListInterface;
use TripSorter\CardsList\ResultCardsList;

/**
 * Class AppSorter
 * @package TripSorter
 */
final class AppSorter implements SorterInterface
{
    /**
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