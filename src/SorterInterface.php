<?php
declare(strict_types=1);

namespace TripSorter;


use TripSorter\CardsList\CardsListInterface;
use TripSorter\CardsList\InputCardsList;

interface SorterInterface
{
    public function sort(InputCardsList $cardsList) : CardsListInterface;
}