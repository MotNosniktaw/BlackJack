<?php

require '../game.php';

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testBuildDeck_52CardsWith3Values()
    {
        // Setup
        $suits = ['Hearts', 'Spades', 'Clubs', 'Diamonds'];
        $faceValues = ['Ace', 'King', 'Queen', 'Jack', '10', '9', '8', '7', '6', '5', '4', '3', '2'];
        $cardValues = [11, 10, 10, 10, 10, 9, 8, 7, 6, 5, 4, 3, 2];
        $expectedDeckLength = 52;
        $expectedNumDetailsFirstCard = 3;
        $expectAllCardThreeDetails = true;
        $expectedThirdValueType = integer;

        // Execution
        $deck = buildDeck($suits, $faceValues, $cardValues);
        $deckLength = count($deck);
        $numDetailsFirstCard = count($deck[0]);
        foreach ($deck as $card) {
            if (count($card) !== 3) {
                $allCardThreeDetails = false;
                break;
            } else {
                $allCardThreeDetails = true;
                echo $allCardThreeDetails;
            }
        }
        $thirdValueType = gettype($deck[0][2]);

        // Assertions
        $this->assertEquals($expectedDeckLength, $deckLength);
        $this->assertEquals($expectedNumDetailsFirstCard, $numDetailsFirstCard);
        $this->assertEquals($expectAllCardThreeDetails, $allCardThreeDetails);
        $this->assertEquals($expectedThirdValueType, $thirdValueType);

    }

    public function testDealCard()
    {
        // Setup
        $deck = [['Hearts', 'Ace', 11], ['Hearts', 'King', 10], ['Hearts', 'Queen', 10], ['Hearts', 'Jack', 10], ['Hearts', '10', 10], ['Hearts', '9', 9], ['Hearts', '8', 8], ['Hearts', '7', 7], ['Hearts', '6', 6], ['Hearts', '5', 5], ['Hearts', '4', 4], ['Hearts', '3', 3], ['Hearts', '2', 2], ['Spades', 'Ace', 11], ['Spades', 'King', 10], ['Spades', 'Queen', 10], ['Spades', 'Jack', 10], ['Spades', '10', 10], ['Spades', '9', 9], ['Spades', '8', 8], ['Spades', '7', 7], ['Spades', '6', 6], ['Spades', '5', 5], ['Spades', '4', 4], ['Spades', '3', 3], ['Spades', '2', 2], ['Clubs', 'Ace', 11], ['Clubs', 'King', 10], ['Clubs', 'Queen', 10], ['Clubs', 'Jack', 10], ['Clubs', '10', 10], ['Clubs', '9', 9], ['Clubs', '8', 8], ['Clubs', '7', 7], ['Clubs', '6', 6], ['Clubs', '5', 5], ['Clubs', '4', 4], ['Clubs', '3', 3], ['Clubs', '2', 2], ['Diamonds', 'Ace', 11], ['Diamonds', 'King', 10], ['Diamonds', 'Queen', 10], ['Diamonds', 'Jack', 10], ['Diamonds', '10', 10], ['Diamonds', '9', 9], ['Diamonds', '8', 8], ['Diamonds', '7', 7], ['Diamonds', '6', 6], ['Diamonds', '5', 5], ['Diamonds', '4', 4], ['Diamonds', '3', 3], ['Diamonds', '2', 2]];
        $p1Hand = [];
        $p2Hand = [];
        $expectedp1HandSize = 2;
        $expectedp2handSize = 2;
        $expectedDifferentHands = true;
        $expectedP1C1ExistsInDeck = true;
        $expectedP1C2ExistsInDeck = true;
        $expectedP2C1ExistsInDeck = true;
        $expectedP2C2ExistsInDeck = true;

        // Execution
        dealCard($deck, $p1Hand, $p2Hand);
        $p1HandSize = count($p1Hand);
        $p2HandSize = count($p2Hand);
        $differentHands = ($p1Hand !== $p2Hand);
        $p1C1ExistsInDeck = in_array($p1Hand[0],$deck);
        $p1C2ExistsInDeck = in_array($p1Hand[1],$deck);
        $p2C1ExistsInDeck = in_array($p2Hand[0],$deck);
        $p2C2ExistsInDeck = in_array($p2Hand[1],$deck);

        // Assertion
        $this->assertEquals($expectedp1HandSize, $p1HandSize);
        $this->assertEquals($expectedp2handSize, $p2HandSize);
        $this->assertEquals($expectedDifferentHands, $differentHands);
        $this->assertEquals($expectedP1C1ExistsInDeck, $p1C1ExistsInDeck);
        $this->assertEquals($expectedP1C2ExistsInDeck, $p1C2ExistsInDeck);
        $this->assertEquals($expectedP2C1ExistsInDeck, $p2C1ExistsInDeck);
        $this->assertEquals($expectedP2C2ExistsInDeck, $p2C2ExistsInDeck);

    }

    public function testReturnCard()
    {
        // Setup
        $pXHand = [['Hearts', '7', 7], ['Spades', 'Ace', 11]];
        $expectedReturnType = string;
        $expectedCardName = '7 Hearts';

        // Execution
        $cardName = returnCard($pXHand, 0);

        // Assertion
        $this->assertEquals($expectedCardName, $cardName);
        $this->assertEquals($expectedReturnType, gettype($cardName));
    }
}