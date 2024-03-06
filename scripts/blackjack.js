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
    revealDealerCard();

    //User interaction needed
    let playerInteraction = document.getElementById("playerInteractions");
    playerInteraction.classList.remove("hidden");
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

async function addPlayerCard(cards) {
    let playerCardBoard = document.getElementById("playerCardBoard");

    let defaultCards = playerCardBoard.children;

    for (let i = 0; i < cards.length; i++) {
        let isFirstCards = false;
        //First two cards reveal
        if (
            defaultCards[i].attributes.src.nodeValue ===
            "assets/cards/cardback.webp"
        ) {
            defaultCards[i].attributes.src.nodeValue = cards[i];
            isFirstCards = true;
        }

        if (!isFirstCards) {
            let newPlayerCard = document.getElementById("playerCardBoard");
            let newCard = document.createElement("img");
            newCard.src = cards[i];
            newPlayerCard.appendChild(newCard);
        }
        newCardSound();
        await sleep(DELAY_BETWEEN_CARDS);
    }
}

function revealDealerCard() {
    let dealerCardBoard = document.getElementById("dealerCardBoard");
    let defaultDealerCards = dealerCardBoard.children;

    //Reveal the first dealer card
    for (let i = 0; i < 1; i++) {
        defaultDealerCards[i].attributes.src.nodeValue = generateRandomCard();
        newCardSound();
    }
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

//Add credit to player
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
