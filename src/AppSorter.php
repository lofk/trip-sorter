<?php
declare(strict_types=1);

namespace TripSorter;

use TripSorter\CardsList\CardsListInterface;
use TripSorter\CardsList\InputCardsList;
use TripSorter\CardsList\ResultCardsList;

/**
 * Class AppSorter
 * @package TripSorter
 */
final class AppSorter implements SorterInterface
{
    /**
     * @param InputCardsList $cardsList
     * @return CardsListInterface
     * @throws Exception\BrokenChainException
     */
    public function sort(InputCardsList $cardsList) : CardsListInterface
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