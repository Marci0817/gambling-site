let selectedSide = "";

function flipCoin() {
    if (!selectedSide) {
        alert("Please select a side first!");
        return;
    }

    let bet = document.getElementById("bet").value;
    if (bet <= 0) {
        alert("Please enter a valid bet!");
        return;
    }

    let imageContainer = document.getElementById("imageContainer");
    imageContainer.classList.add("flipCoin");
}

function selectSide(side) {
    let tail = document.getElementById("tail");
    let head = document.getElementById("head");
    if (side === "head") {
        tail.classList.remove("selected");
        head.classList.add("selected");
    } else {
        head.classList.remove("selected");
        tail.classList.add("selected");
    }
    selectedSide = side;
}
