const DELAY_BETWEEN_CARDS = 500;

let playerBet = 0; //Player current bet

let dealerCards = [];
let playerCards = [];

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

    revealCard("player", playerCardBoard, cards);
}

function addDealerCard(cards) {
    let dealerCardBoard = document.getElementById("dealerCardBoard");
    revealCard("dealer", dealerCardBoard, cards);
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

/**
 * Reveals the cards in the specified player's hand.
 * @param {string} which - player or dealer to reveal the card
 * @param {HTMLElement} whichPlayerCard - The container element for the player/dealer's cards.
 * @param {string[]} cards - An array of card image URLs.
 * @returns {Promise<void>} - A promise that resolves when all cards are revealed.
 */
async function revealCard(which, whichPlayerCard, cards) {
    let cardsDom = whichPlayerCard.children;

    for (let i = 0; i < cards.length; i++) {
        //TODO: handle if there is 1 unrevealed card
        let isFirstCard = false;
        //First two cards reveal
        console.log(cardsDom[i].attributes.src.nodeValue);
        if (
            cardsDom[i].attributes.src.nodeValue ===
            "/assets/cards/cardback.webp"
        ) {
            cardsDom[i].attributes.src.nodeValue = cards[i];
            isFirstCard = true;
        }

        if (!isFirstCard) {
            let newPlayerCard = document.getElementById(which + "CardBoard");
            let newCard = document.createElement("img");
            newCard.src = cards[i];
            newPlayerCard.appendChild(newCard);
        }
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

    switch (cardNumber) {
        case 11:
            cardNumber = "J";
            break;
        case 12:
            cardNumber = "Q";
            break;
        case 13:
            cardNumber = "K";
            break;
        case 14:
            cardNumber = "A";
            break;
        default:
            break;
    }

    return `/assets/cards/${cardNumber}-${cardSuit}.webp`;
}
