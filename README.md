# Trip Sorter

TripSorter is an application that allows to sort a set of boarding cards, by finding where the journey starts, following by the coming trips.
## Description
Full description [here](../blob/master/docs/Documentation.md)
## Installation
This application requires :
- PHP 7.x
- Composer
```sh
composer install
```
## Usage
To use the trip-sorter application, you have to create a CardsList object containing Cards objects.
Then use the AppSorter object to sort the Cards contained in the CardsList.
```php
use TripSorter\Cards\{BusCard, TrainCard, FlightCard};

$list = new InputCardsList();
$card = new BusCard();
$card->setDeparture('Roma');
$card->setArrival('Milan');
$card->setRefNumber('ROMILAN');
$list->addCard($card);
//Add more cards objects and add them to the list
$sorter = new AppSorter();
$sortedList = $sorter->sort($list);
```
You can also sort an array of cards data (array), but beforehand, the array must be mapped by the DataTransformer
to create a CardsList object.
```php
use TripSorter\AppSorter;
use TripSorter\Cards\CardFactory;
use TripSorter\DataTransformer\CardsListTransformer;

$data = [
    [
        'ref_number' => 'ROMILAN',
        'departure' => 'Rome',
        'arrival' => 'Milan',
        'type' => CardFactory::PLANE_TYPE,
    ],
  //Add More cards
];

$transformer = new CardsListTransformer();
$cardsList = $transformer->arrayToObject($data);
$sorter = new AppSorter();
$sortedList = $sorter->sort($cardsList);
```
## Demo
```sh
php index.php
```
## Tests
```sh
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/
```
## Docker
```sh
docker-compose up -d

# run the tests
docker-compose exec apache ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/

# run the demo
docker-compose exec apache php index.php
```