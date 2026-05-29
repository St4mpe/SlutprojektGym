document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".message a");
    const registerForm = document.querySelector(".register-form");
    const loginForm = document.querySelector(".login-form");

    links.forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            registerForm.classList.toggle("active");
            loginForm.classList.toggle("active");
        });
    });

    const customMessages = {
        "name":       "Namnet får bara innehålla bokstäver (max 20 tecken).",
        "password":   "Lösenordet måste vara 6–32 tecken, bara bokstäver och siffror.",
        "email":      "Ange en giltig e-postadress, t.ex. namn@exempel.se",
    };

    document.querySelectorAll("input:not([type='submit'])").forEach(function (input) {
        input.addEventListener("input", function () {
            if (input.name === "email" && input.validity.customError) return;
            input.setCustomValidity("");
        });

        input.addEventListener("invalid", function () {
            if (input.name === "email" && input.validity.customError) return;
            const msg = customMessages[input.name];
            if (msg) input.setCustomValidity(msg);
        });
    });

    const emailInput = document.querySelector(".register-form input[name='email']");
    emailInput.addEventListener("input", function () {
        const email = emailInput.value;
        if (!emailInput.validity.typeMismatch && email.length > 4) {
            fetch("emailcheck.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "email=" + encodeURIComponent(email)
            })
            .then(function (res) { return res.text(); })
            .then(function (result) {
                if (result.trim() === "taken") {
                    emailInput.setCustomValidity("Den här mailadressen är redan registrerad.");
                } else {
                    emailInput.setCustomValidity("");
                }
            });
        }
    });
});