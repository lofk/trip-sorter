<?php

require_once __DIR__ . 'vendor/autoload.php';

$sorter = new \TripSorter\AppSorter();
$cardsList = new TripSorter\CardsList\InputCardsList();
$trip1 = new \TripSorter\Cards\BusCard();
$trip1->setRefNumber('bus1');
$trip1->setDeparture('Paris');
$trip1->setArrival('Bruxelles');
$cardsList->addCard($trip1);

$trip2 = new \TripSorter\Cards\TrainCard();
$trip2->setRefNumber('train1');
$trip2->setDeparture('Toulouse');
$trip2->setArrival('Paris');
$trip2->setSeat('TR123');
$cardsList->addCard($trip2);

$trip3 = new \TripSorter\Cards\FlightCard();
$trip3->setRefNumber('bus1');
$trip3->setDeparture('Bruxelles');
$trip3->setArrival('London');
$trip3->setGate('B32');
$trip3->setSeat('J51');
$cardsList->addCard($trip3);

$result = $sorter->sort($cardsList);
echo json_encode($result->getCards());
