<?php
declare(strict_types=1);

namespace TripSorter;


use TripSorter\CardsList\CardsListInterface;

interface SorterInterface
{
    public function sort(CardsListInterface $cardsList) : CardsListInterface;
}