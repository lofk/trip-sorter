<?php
declare(strict_types=1);

namespace TripSorter;


use TripSorter\CardsList\CardsListInterface;

final class AppSorter implements SorterInterface
{
    public function sort(CardsListInterface $cardsList) : CardsListInterface
    {
        /**
         * @todo implements sort logic
         */
    }
}