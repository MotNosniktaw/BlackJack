<?php

$deck = [];
$suits = ['Hearts', 'Spades', 'Clubs', 'Diamonds'];
$faceValues = ['Ace', 'King', 'Queen', 'Jack', '10', '9', '8', '7', '6', '5', '4', '3', '2'];
$cardValues = [11, 10, 10, 10, 10, 9, 8, 7, 6, 5, 4, 3, 2];

/**
 * @param array $groups
 * @param array $faces
 * @param array $worths
 * @return array
 * Takes arrays declared inside game.php and builds a deck with one card of each face-combination
 * each element in the product indexed array (deck) is a nested indexed array (card) containing 'Suit', 'Face Value and 'Point Value
 * Value is assigned to card according to relative position of face and point values within their initial declaration arrays
 */

function buildDeck(array $groups, array $faces, array $worths): array {
    $pack = [];
    foreach ($groups as $group) {
        foreach ($faces as $face){
            array_push($pack, [$group, $face, $worths[array_search($face, $faces)]]);
        }
    }
    return $pack;
}

/**
 * @param array $array
 * This function shuffles order of nested indexed arrays within the target array using the array_shuffle function
 */

function shuffleDeck(array &$array) {
    shuffle($array);
}

/**
 * @param array $cards
 * @param array $hands1
 * @param array $hands2
 * This function fills 2 empty array (need to be assigned prior to call) with cards from a shuffled deck array
 * card is pushed into hand arrays while simultaneously popping them from deck array
 * Arrays that are filled by this function represent the hands of the 2 players
 * function is destructive and will result in cards being lost from the deck
 */

function dealCard(array &$cards, array &$hands1, array &$hands2)
{
    for ($x = 0; $x < 2; $x++) {
        array_push($hands1, array_pop($cards));
        array_push($hands2, array_pop($cards));
    }
}

/**
 * @param array $hand
 * @param int $card
 * @return string
 * Returns face and suit values of cards in hand arrays
 * these are to be echoed into class section of "card" divs in html
 */

function returnCard(array $hand, int $card): string {
    return $hand[$card][1] . ' ' . $hand[$card][0];
}

/**
 * @param array $hand
 * @return int|mixed
 * takes the point value of cards in a players hand array and calculates the total score for that players hand
 */

function calcScore(array $hand) {
    $tally = 0;
    foreach ($hand as $point) {
        $tally += $point[2];
    }
    return $tally;
}

/**
 * @param int $score1
 * @param int $score2
 * takes the player hand score then suing a switch command:
 *      - checks whether one or boths players have gone bust and declares any wins or draws
 *      - or compares which player has the highest socre if both players have less than the bust score
 * returns a string that indicates the winner
 */

function compareScore(int $score1, int $score2):string {
    switch ($score1) {
        case $score1 > 21 && $score2 > 21;
            return 'Both Players have gone bust! No winners today!';
            break;
        case $score1 > 21 && $score2 <= 21;
            return 'Player 1 is bust! Player 2 wins!';
            break;
        case $score1 <= 21 && $score2 > 21;
            return 'Player 2 is bust! Player 1 wins!';
            break;
        case $score1 > $score2 && ($score1 <= 21 && $score2 <= 21);
            return 'Player 1 wins!';
            break;
        case $score1 < $score2 && ($score1 <= 21 && $score2 <= 21);
            return 'Player 2 wins!';
            break;
        case $score1 === $score2 && ($score1 <= 21 && $score2 <= 21);
            return 'Scores are the same! Split the pot!';
            break;
        default;
            return 'Something doesn\'t add up here!!!';
    }
}

