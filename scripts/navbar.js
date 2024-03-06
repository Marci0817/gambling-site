function init() {
    let navbar = document.getElementById("navbar");
    if (!navbar) {
        console.error(
            "navbar.js imported but an element with id 'navbar' was not found."
        );
        return;
    }

    document.addEventListener("scroll", function () {
        navbar.classList.toggle("collapsed", window.scrollY > 0);
    });
}

init();
