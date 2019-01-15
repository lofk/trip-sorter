<?php

namespace TripSorter\Tests;


use PHPUnit\Framework\TestCase;
use TripSorter\CardsList\ResultCardsList;
use TripSorter\Cards\{BusCard, FlightCard, TrainCard};

class ResultCardsListTest extends TestCase
{
    /**
     * @dataProvider renderTextProvider
     * @param ResultCardsList $cardsList
     * @param string $expected
     */
    public function testRenderText(ResultCardsList $cardsList, string $expected) : void
    {
        $html = $cardsList->renderText();
        $this->assertEquals($expected, $html);
    }

    /**
     * @dataProvider renderHtmlProvider
     * @param ResultCardsList $cardsList
     * @param string $expected
     */
    public function testRenderHtml(ResultCardsList $cardsList, string $expected) : void
    {
        $html = $cardsList->renderHtml();
        $this->assertEquals($expected, $html);
    }

    public function renderTextProvider() : array
    {
        $expected = <<<EOF
Take train testtrain1 from city A to city B. Sit in seat 0213.
Take the bus testbus1 from city B to city C. No seat Assignment.
From city C, take flight testflight1 to city D. Gate GATE A, seat 111.
You have arrived at your final destination.

EOF;

        return [
            [$this->getResultCardsList(), $expected]
        ];
    }

    public function renderHtmlProvider() : array
    {
        $expected = <<<EOF
<ul>
<li>Take train testtrain1 from city A to city B. Sit in seat 0213.</li>
<li>Take the bus testbus1 from city B to city C. No seat Assignment.</li>
<li>From city C, take flight testflight1 to city D. Gate GATE A, seat 111.</li>
<li>You have arrived at your final destination.</li>
</ul>

EOF;

        return [
            [$this->getResultCardsList(), $expected]
        ];
    }

    private function getResultCardsList() : ResultCardsList
    {
        $trip1 = new BusCard();
        $trip1->setRefNumber('testbus1');
        $trip1->setDeparture('city B');
        $trip1->setArrival('city C');

        $trip2 = new FlightCard();
        $trip2->setRefNumber('testflight1');
        $trip2->setDeparture('city C');
        $trip2->setArrival('city D');
        $trip2->setGate('GATE A');
        $trip2->setSeat('111');

        $trip3 = new TrainCard();
        $trip3->setRefNumber('testtrain1');
        $trip3->setDeparture('city A');
        $trip3->setArrival('city B');
        $trip3->setSeat('0213');

        $list = new ResultCardsList();
        $list->setCards([$trip3, $trip1, $trip2]);

        return $list;
    }
}