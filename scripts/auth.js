function selectForm(type) {
    switch (type) {
        case "login":
            document.getElementById("loginForm").classList.remove("hidden");
            document.getElementById("registerForm").classList.add("hidden");
            break;
        case "register":
            document.getElementById("loginForm").classList.add("hidden");
            document.getElementById("registerForm").classList.remove("hidden");
            break;
    }
}
