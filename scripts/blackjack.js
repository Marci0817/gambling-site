const DELAY_BETWEEN_CARDS = 500;

let playerBet = 0; //Player current bet

let dealerCards = [];
let playerCards = [];

let isCoinsHudVisible = true;

async function startNewGame() {
    let startButton = document.getElementById("startButton");
    startButton.classList.add("hidden");

    //Make request to server to start new game and get the cards
    /* ...later.. */
    addPlayerCard([generateRandomCard(), generateRandomCard()]);
    await sleep(2 * DELAY_BETWEEN_CARDS); // 2* DELAY_BETWEEN_CARDS, 2 because we have 2 cards
    addDealerCard([generateRandomCard()]);

    //User interaction needed
    let playerInteraction = document.getElementById("playerInteractions");
    playerInteraction.classList.remove("hidden");
    playerInteraction.classList.add("flex");
}

function playerAction(action) {
    let playerInteraction = document.getElementById("playerInteractions");
    playerInteraction.classList.add("hidden");
    addDealerCard([generateRandomCard()]);
    switch (action) {
        case "hit":
            //later request
            break;
        case "stand":
            //later request
            break;
        case "double":
            //later request
            break;
        case "split":
            //later request
            break;
        default:
            break;
    }

    //for now generate random card
    addPlayerCard([generateRandomCard()]);
}

function addPlayerCard(cards) {
    let playerCardBoard = document.getElementById("playerCardBoard");
    revealCard(playerCardBoard, cards);
}

function addDealerCard(cards) {
    let dealerCardBoard = document.getElementById("dealerCardBoard");
    revealCard(dealerCardBoard, cards);
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

async function revealCard(whichPlayerCard, cards) {
    let cardBacksIndex = [];

    for (let i = 0; i < whichPlayerCard.children.length; i++) {
        if (whichPlayerCard.children[i].classList.contains("back")) {
            cardBacksIndex.push(i);
        }
    }

    if (cardBacksIndex.length == 1) {
        whichPlayerCard.children[cardBacksIndex[0]].parentNode.replaceChild(
            cards[0],
            whichPlayerCard.children[cardBacksIndex[0]]
        );
        newCardSound();
        await sleep(DELAY_BETWEEN_CARDS);
        return;
    }

    if (cardBacksIndex.length == 2) {
        for (let i = 0; i < cardBacksIndex.length; i++) {
            if (cards.length === 1 && i === 1) break;
            whichPlayerCard.children[cardBacksIndex[i]].parentNode.replaceChild(
                cards[i],
                whichPlayerCard.children[cardBacksIndex[i]]
            );
            newCardSound();
            await sleep(DELAY_BETWEEN_CARDS);
        }
        return;
    }

    for (let i = 0; i < cards.length; i++) {
        whichPlayerCard.appendChild(cards[i]);
        newCardSound();
        await sleep(DELAY_BETWEEN_CARDS);
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

//For testing generate random card
function generateRandomCard() {
    let cardNumber = Math.floor(Math.random() * 13) + 2;
    let cardSuit = Math.floor(Math.random() * 4) + 1;

    switch (cardSuit) {
        case 1:
            cardSuit = "c";
            break;
        case 2:
            cardSuit = "d";
            break;
        case 3:
            cardSuit = "h";
            break;
        case 4:
            cardSuit = "s";
            break;
        default:
            break;
    }
    return createCard(cardNumber, cardSuit);
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
