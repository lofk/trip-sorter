<?php
declare(strict_types=1);

namespace TripSorter\DataTransformer;

use TripSorter\Cards\{CardFactory, CardInterface};
use TripSorter\CardsList\CardsListInterface;

/**
 * Class AbstractCardTransformer
 * @package TripSorter\Transformer
 */
abstract class AbstractCardTransformer implements TransformerInterface
{
    /**
     * @var CardFactory
     */
    private $factory;

    public function __construct()
    {
        $this->factory = new CardFactory();
    }

    /**
     * @return CardFactory
     */
    public function getFactory() : CardFactory
    {
        return $this->factory;
    }

    /**
     * @param array $data
     * @return CardInterface|CardsListInterface
     */
    abstract public function arrayToObject(array $data);
}