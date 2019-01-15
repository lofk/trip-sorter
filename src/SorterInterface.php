<?php
declare(strict_types=1);

namespace TripSorter;

use TripSorter\CardsList\CardsListInterface;

/**
 * Interface SorterInterface
 * @package TripSorter
 */
interface SorterInterface
{
    /**
     * @param CardsListInterface $cardsList
     * @return CardsListInterface
     */
    public function sort(CardsListInterface $cardsList) : CardsListInterface;
}