let container = document.getElementById("container");

let prevTimestamp = 0;

function frame(timestamp) {
    if (prevTimestamp != 0) {
        let delta = timestamp - prevTimestamp;
        tick(delta);
    }

    prevTimestamp = timestamp;
    window.requestAnimationFrame(frame);
}

window.requestAnimationFrame(frame);

let bubbles = [];

function tick(delta) {
    if (bubbles.length < 5) {
        let value = Math.floor(Math.random() * 3000);
        let el = document.createElement("div");
        el.innerText = "$" + value;
        el.classList.add("bubble");
        container.appendChild(el);
        
        bubbles.push({
            value: value,
            angle: Math.random() * Math.PI * 2,
            x: Math.floor(Math.random() * container.clientWidth),
            y: Math.floor(Math.random() * container.clientHeight),
            el: el,
        });
    }

    for (let bubble of bubbles) {
        bubble.x += Math.cos(bubble.angle) * delta * 0.03;
        bubble.y += Math.sin(bubble.angle) * delta * 0.03;
        bubble.el.style.transform = `translate(${bubble.x}px, ${bubble.y}px)`;

        if (bubble.x < -96 || bubble.y < -96 || bubble.x > container.clientWidth || bubble.y > container.clientHeight) {
            bubble.el.remove();
            bubbles = bubbles.filter((b) => b !== bubble);
        }
    }
}
