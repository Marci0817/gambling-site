async function flipCoin() {
    let imageContainer = document.getElementById("imageContainer");
    let rotationAngle = 0;
    imageContainer.classList.add("flipCoin");
    imageContainer.style.animationIterationCount = 5;
    imageContainer.style.content = "url('/assets/coins/head.png')";
}
