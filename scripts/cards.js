function createCard(index, suit) {
    const suits = "cdhs";
    const rows = 13;
    const cols = 4;

    let left = suits.indexOf(suit.toLowerCase()) * 100;
    let top = (index - 2) * 100;

    let el = document.createElement("div");
    el.classList.add("card");
    el.style.backgroundPosition = `-${left}% -${top}%`;

    return el;
}

function createCardBack() {
    let el = document.createElement("div");
    el.classList.add("card");
    el.classList.add("back");
    
    return el;
}
