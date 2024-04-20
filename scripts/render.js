refreshBalance();

function refreshBalance() {
    let xhr = new XMLHttpRequest();
    let response;
    xhr.open("POST", "../api/coinflip.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            response = JSON.parse(xhr.responseText);
            let balance = response["balance"];
            document.getElementById("balance").innerText = balance + " $";
        }
    };
    xhr.send(`getBalance`);
}
