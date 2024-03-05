/*let allCardNumbers = 0; //all card number

function addCardNumber(card) {
    allCardNumbers += card;
    let cardNumberValue = document.getElementById("cardNumber");
    cardNumberValue.innerText = allCardNumbers;
}*/

let playerBet = 0; //Player current bet

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

let dealerCards = [];
let playerCards = [];

async function startNewGame() {
    //Make request to server to start new game and get the cards
    /* ...later.. */

    let playerCardBoard = document.getElementById("playerCardBoard");

    let defaultCards = playerCardBoard.children;

    //Reveal first two cards
    for (let i = 0; i < defaultCards.length; i++) {
        setTimeout(() => {
            defaultCards[i].attributes.src.nodeValue = generateRandomCard();
            newCardSound();
        }, i * 500);
    }
    console.log(defaultCards);
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
