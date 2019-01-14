<?php
declare(strict_types=1);

namespace TripSorter;

use TripSorter\CardsList\CardsListInterface;
use TripSorter\CardsList\InputCardsList;

/**
 * Interface SorterInterface
 * @package TripSorter
 */
interface SorterInterface
{
    /**
     * @param InputCardsList $cardsList
     * @return CardsListInterface
     */
    public function sort(InputCardsList $cardsList) : CardsListInterface;
}