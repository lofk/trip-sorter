<?php
declare(strict_types=1);

namespace TripSorter\DataTransformer;

use TripSorter\Cards\CardInterface;
use TripSorter\CardsList\CardsListInterface;

/**
 * Interface TransformerInterface
 * @package TripSorter\Transformer
 */
interface TransformerInterface
{
    /**
     * @param array $data
     * @return CardInterface|CardsListInterface
     */
    public function arrayToObject(array $data);
}