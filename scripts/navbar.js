(() => {
    let navbar = document.getElementById("navbar");
    if (!navbar) {
        console.error(
            "navbar.js imported but an element with id 'navbar' was not found."
        );
        return;
    }

    navbar.classList.toggle("at-top", window.scrollY == 0);

    document.addEventListener("scroll", function () {
        navbar.classList.toggle("at-top", window.scrollY == 0);
    });
})();
