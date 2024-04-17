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

    let imageContainer = document.getElementById("coin");

    let xhr = new XMLHttpRequest();
    let response;
    xhr.open("POST", "../api/coinflip.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = async function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            response = JSON.parse(xhr.responseText);

            if (response.side === "head") {
                imageContainer.classList.add("heads");
            } else {
                imageContainer.classList.add("tails");
            }
            await sleep(3200);
            alert(
                response.result == "win"
                    ? "Yeyy, you won " + response.prize
                    : "Noo, you lost"
            );
        }
    };
    xhr.send(`side=${selectedSide}&bet=${bet}`);
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

async function sleep(interval) {
    return new Promise((resolve) => {
        setTimeout(resolve, interval);
    });
}
