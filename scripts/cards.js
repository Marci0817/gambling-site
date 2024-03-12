function createCard(index, suit) {
    const suits = "cdhs";
    const w = 240;
    const h = 336;
    const padding = 1;

    let left = suits.indexOf(suit.toLowerCase()) * (w + padding * 2) + padding;
    let top = (index - 2) * (h + padding * 2) + padding;

    let el = document.createElement("div");
    el.classList.add("card");
    el.style.backgroundPosition = `-${left}px -${top}px`;

    return el;
}

function createCardBack() {
    let el = document.createElement("div");
    el.classList.add("card");
    el.classList.add("back");
    
    return el;
}
