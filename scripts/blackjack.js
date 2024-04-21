const DELAY_BETWEEN_CARDS = 500;

let playerBet = 0; //Player current bet

let isCoinsHudVisible = true;

checkForOngoing();

async function checkForOngoing() {
    const res = await fetch("/api/blackjack.php");
    const game = await res.json();

    if (game.state !== "NONE") {
        loadGame(game, false);
    } else {
        let startButton = document.getElementById("startButton");
        startButton.classList.remove("hidden");
    }
}

async function startNewGame() {
    const res = await fetch("/api/blackjack.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ bet: playerBet }),
    });
    const game = await res.json();
    refreshBalance();
    await loadGame(game, true);
}

async function loadGame(game, withFeedback) {
    let startButton = document.getElementById("startButton");
    startButton.classList.add("hidden");
    
    document.getElementById("bottomHud").classList.add("hidden");

    await showGameState(game, withFeedback);

    let playerInteraction = document.getElementById("playerInteractions");
    playerInteraction.classList.remove("hidden");
    playerInteraction.classList.add("flex");
}

async function playerAction(action) {
    let playerInteraction = document.getElementById("playerInteractions");
    playerInteraction.classList.add("hidden");

    const res = await fetch("/api/blackjack.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ action }),
    });
    const game = await res.json();

    await showGameState(game, true);
}

async function showGameState(game, withFeedback) {
    const playerCardBoard = document.getElementById("playerCardBoard");
    const dealerCardBoard = document.getElementById("dealerCardBoard");

    await revealCards(playerCardBoard, game.playerHand, withFeedback);
    await revealCards(dealerCardBoard, game.dealerHand, withFeedback);

    const endScreen = document.getElementById("endScreen");
    const endTitle = document.getElementById("endTitle");
    const endDescription = document.getElementById("endDescription");

    if (game.state !== "ONGOING") {
        endScreen.classList.add("show");
    }

    switch (game.state) {
        case "WIN":
            endTitle.innerText = "YOU WON!";
            endTitle.classList.add("win");
            endDescription.innerText = `$${game.bet} has been credited to your account.`;
            break;
        case "LOSE":
            endTitle.innerText = "YOU LOST!";
            endTitle.classList.add("lose");
            endDescription.innerText = "The dealer has defeated you.";
            break;
        case "DRAW":
            endTitle.innerText = "DRAW!";
            endDescription.innerText = "You have gained your credits back.";
            break;
    }

    refreshBalance();
}

// Helper functions

function getSoundValue() {
    let checkbox = document.getElementById("soundOnOff");
    return checkbox.checked;
}

function setPlayerBetCount(value) {
    let playerBetCount = document.getElementById("playerChips");
    playerBetCount.innerText = value;
}

function newCardSound() {
    if (getSoundValue()) {
        let audio = new Audio("/assets/sounds/newcardintable.mp3");
        audio.play();
    }
}

async function sleep(interval) {
    return new Promise((resolve) => {
        setTimeout(resolve, interval);
    });
}

async function revealCards(hand, cards, withFeedback) {
    const totalCount = hand.children.length;
    const visibleCount = hand.querySelectorAll(".card:not(.back)").length;

    for (let i = visibleCount; i < cards.length; i++) {
        const card = createCardFromString(cards[i]);

        if (i < totalCount) {
            hand.replaceChild(card, hand.children[i]);
        } else {
            hand.appendChild(card);
        }

        if (withFeedback) {
            newCardSound();
            await sleep(DELAY_BETWEEN_CARDS);
        }
    }
}

/**
 * Adds the specified credit to the player's bet and plays a sound based on the credit value.
 * @param {number} credit - The credit to be added to the player's bet.
 */
function addCredit(credit) {
    playerBet += credit;

    if (getSoundValue()) {
        if (credit > 0 && credit < 10) {
            //1-5
            let audio = new Audio("/assets/sounds/chip2.mp3");
            audio.play();
        }

        if (credit >= 10 && credit <= 25) {
            //10-25
            let audio = new Audio("/assets/sounds/chip3.mp3");
            audio.play();
        }

        if (credit > 25 && credit <= 1000) {
            //100-1000
            let audio = new Audio("/assets/sounds/chip4.mp3");
            audio.play();
        }

        if (credit > 1000) {
            //5000-10000+
            let audio = new Audio("/assets/sounds/chip5.mp3");
            audio.play();
        }
    }
    setPlayerBetCount(playerBet);
}

function createCardFromString(card) {
    let suit = card[card.length - 1];
    let num = parseInt(card.slice(0, -1));

    return createCard(num, suit);
}

function showCoins() {
    let coins = document.getElementById("coinsHud");
    let button = document.getElementById("hideButton");
    if (isCoinsHudVisible) {
        coins.classList.add("hidden");
        isCoinsHudVisible = false;
        button.innerText = "Show coins";
        return;
    }
    isCoinsHudVisible = true;
    coins.classList.remove("hidden");
    button.innerText = "Hide coins";
}
