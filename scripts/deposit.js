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
        el.onclick = () => {
            el.innerHTML = numberToSzamnev(value);
        };

        const x = Math.floor(Math.random() * container.clientWidth);
        const y = Math.floor(Math.random() * container.clientHeight);

        const angle = Math.atan2(
            container.clientWidth / 2 - x,
            container.clientHeight / 2 - y
        );

        bubbles.push({
            value,
            angle,
            x,
            y,
            el,
        });
    }

    for (let bubble of bubbles) {
        bubble.x += Math.cos(bubble.angle) * delta * 0.03;
        bubble.y += Math.sin(bubble.angle) * delta * 0.03;
        bubble.el.style.transform = `translate(${bubble.x}px, ${bubble.y}px)`;

        if (
            bubble.x < -96 ||
            bubble.y < -96 ||
            bubble.x > container.clientWidth ||
            bubble.y > container.clientHeight
        ) {
            bubble.el.remove();
            bubbles = bubbles.filter((b) => b !== bubble);
        }
    }
}

let prefixes = [
    "",
    "két",
    "három",
    "négy",
    "öt",
    "hat",
    "hét",
    "nyolc",
    "kilenc",
];
let suffixes = [
    "egy",
    "kettő",
    "három",
    "négy",
    "öt",
    "hat",
    "hét",
    "nyolc",
    "kilenc",
];

let thousand = "ezer";
let hundred = "száz";
let tensPrefixes = [
    "tizen",
    "huszon",
    "harminc",
    "negyven",
    "ötven",
    "hatvan",
    "hetven",
    "nyolcvan",
    "kilencven",
];

let tens = [
    "tíz",
    "húsz",
    "harminc",
    "negyven",
    "ötven",
    "hatvan",
    "hetven",
    "nyolcvan",
    "kilencven",
];

function numberToSzamnev(number) {
    const str = number.toString();
    let res = "";

    let prevNonZero = 0;
    for (let i = 0; i < str.length; i++) {
        const digit = parseInt(str.charAt(i));
        let nextDigit = 0;
        if (i < str.length - 1) {
            nextDigit = parseInt(str.charAt(i + 1));
        }

        if (digit > 0 && prevNonZero >= 2000) {
            res += "-";
        }

        switch (str.length - i) {
            case 4:
                res += prefixes[digit - 1] + thousand;
                break;
            case 3:
                if (digit > 0) {
                    res += prefixes[digit - 1] + hundred;
                }
                break;
            case 2:
                if (digit > 0) {
                    if (nextDigit > 0) {
                        res += tensPrefixes[digit - 1];
                    } else {
                        res += tens[digit - 1];
                    }
                }
                break;
            case 1:
                if (digit > 0) {
                    res += suffixes[digit - 1];
                }
        }

        if (digit != 0) {
            prevNonZero = digit * 10 ** (str.length - i - 1);
        }
    }

    return res;
}

for (let i = 0; i <= 3000; i++) console.log(numberToSzamnev(i));
