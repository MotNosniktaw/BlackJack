<?php require 'game.php'; ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="normalize-8-0-1.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>BlackJack</title>
</head>
<body>
    <div class="container">
        <div>
            <h1>Super Awesome Blackjack(-ish) Game!!</h1>
        </div>
        <?php
        $deck = buildDeck($suits, $faceValues, $cardValues);
        shuffleDeck($deck);
        $p1Hand = [];
        $p2Hand = [];
        dealCard($deck, $p1Hand, $p2Hand);
        ?>
        <div class="board-container">
                <div class="player-container">
                    <h2>Player 1</h2>
                    <div class="hand-container">
                        <div class="card <?php echo returnCard($p1Hand, 0); ?>"><span></span></div>
                        <div class="card <?php echo returnCard($p1Hand, 1); ?>"><span></span></div>
                        <span class="bust <?php echo $p1Score = calcScore($p1Hand); ?>">BUST!</span>
                        <span class="blackjack <?php echo $p1Score = calcScore($p1Hand); ?>">BLACK-JACK!<img src="balloons.png"></span>
                    </div>
                    <h3>Score: <?php echo $p1Score = calcScore($p1Hand); ?></h3>
                </div>
                <div class="player-container">
                    <h2>Player 2</h2>
                    <div class="hand-container">
                        <div class="card <?php echo returnCard($p2Hand, 0); ?>"><span></span></div>
                        <div class="card <?php echo returnCard($p2Hand, 1); ?>"><span></span></div>
                        <span class="bust <?php echo $p2Scoreore = calcScore($p2Hand); ?>">BUST!</span>
                        <span class="blackjack <?php echo $p2Score = calcScore($p2Hand); ?>">BLACK-JACK!<img src="balloons.png"></span>
                    </div>
                    <h3>Score: <?php echo $p2Score = calcScore($p2Hand); ?></h3>
                </div>
        </div>
        <div class="result">
            <p>
                <?php echo compareScore($p1Score, $p2Score); ?>
            </p>
        </div>
    </div>
</body>
</html>