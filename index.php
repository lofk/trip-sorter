<?php

require_once __DIR__ . '/vendor/autoload.php';

use TripSorter\AppSorter;
use TripSorter\Cards\CardFactory;
use TripSorter\DataTransformer\CardsListTransformer;

$list = [
    [
        'ref_number' => '78A',
        'departure' => 'Madrid',
        'arrival' => 'Barcelona',
        'type' => CardFactory::TRAIN_TYPE,
        'seat' => '45B',
    ],
    [
        'ref_number' => null,
        'departure' => 'Barcelona',
        'arrival' => 'Girona Airport',
        'type' => CardFactory::BUS_TYPE,
        'seat' => null,
    ],
    [
        'ref_number' => 'SK455',
        'departure' => 'Girona Airport',
        'arrival' => 'Stockholm',
        'type' => CardFactory::PLANE_TYPE,
        'gate' => '45B',
        'seat' => '3A',
        'counter' => '344',
    ],
    [
        'ref_number' => 'SK22',
        'departure' => 'Stockholm',
        'arrival' => 'New York JFK',
        'type' => CardFactory::PLANE_TYPE,
        'gate' => '22',
        'seat' => '7B',
        'counter' => null,
    ],
];

$sorter = new AppSorter();
$transformer = new CardsListTransformer();
$cardsList = $transformer->arrayToObject($list);
$result = $sorter->sort($cardsList);
echo $result->renderHtml();
