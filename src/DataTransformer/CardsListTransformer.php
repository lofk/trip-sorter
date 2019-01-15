<?php
declare(strict_types=1);

namespace TripSorter\DataTransformer;

use TripSorter\CardsList\{CardsListInterface, InputCardsList};

/**
 * Class CardsListTransformer
 * @package TripSorter\Transformer
 */
class CardsListTransformer extends AbstractCardTransformer
{
    /**
     * @param array $data
     * @return CardsListInterface
     */
    public function arrayToObject(array $data)
    {
        $cardsList = new InputCardsList();
        $transformer = new CardTransformer();
        foreach($data as $cardData) {
            $object = $transformer->arrayToObject($cardData);
            $cardsList->addCard($object);
        }

        return $cardsList;
    }
}