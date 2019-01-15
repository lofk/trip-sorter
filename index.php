<?php

require_once __DIR__ . '/vendor/autoload.php';

$list = [
    [
        'ref_number' => '78A',
        'departure' => 'Madrid',
        'arrival' => 'Barcelona',
        'type' => \TripSorter\Cards\CardFactory::TRAIN_TYPE,
        'seat' => '45B',
    ],
    [
        'ref_number' => null,
        'departure' => 'Barcelona',
        'arrival' => 'Girona Airport',
        'type' => \TripSorter\Cards\CardFactory::BUS_TYPE,
        'seat' => null,
    ],
    [
        'ref_number' => 'SK455',
        'departure' => 'Girona Airport',
        'arrival' => 'Stockholm',
        'type' => \TripSorter\Cards\CardFactory::PLANE_TYPE,
        'gate' => '45B',
        'seat' => '3A',
        'counter' => '344',
    ],
    [
        'ref_number' => 'SK22',
        'departure' => 'Stockholm',
        'arrival' => 'New York JFK',
        'type' => \TripSorter\Cards\CardFactory::PLANE_TYPE,
        'gate' => '22',
        'seat' => '7B',
        'counter' => null,
    ],
];

$sorter = new \TripSorter\AppSorter();
$transformer = new \TripSorter\DataTransformer\CardsListTransformer();
$cardsList = $transformer->arrayToObject($list);
$result = $sorter->sort($cardsList);
echo $result->renderHtml();
