window.onload = () => {
    const signUpAnchor = document.querySelector(".signup .list-link");
    const loginAnchor = document.querySelector(".login .list-link");
    if (document.URL.includes("/signup.php")) {
        signUpAnchor.classList.replace("off-page-style", "on-page-style");
        loginAnchor.classList.replace("on-page-style", "off-page-style");
    } else if (document.URL.includes("/login.php")) {
        signUpAnchor.classList.replace("on-page-style", "off-page-style");
        loginAnchor.classList.replace("off-page-style", "on-page-style");
    }
};

const checkIfSignUpOrLogin = (fullName, repeatPassword) => {
    if (fullName === null && repeatPassword === null)
        return false;
    return true;
};

const validateForm = () => {
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#password").value;

    let isSignUp = false;
    let fullName = document.querySelector("#fullname");
    let repeatPassword = document.querySelector("#repeat-password");

    if (checkIfSignUpOrLogin(fullName, repeatPassword)) {
        fullName = fullName.value;
        repeatPassword = repeatPassword.value;
        isSignUp = true;
    }
    if (isSignUp && fullName === "") {
        alert("fullName is empty");
        return false;
    }
    if (email === "") {
        alert("email is empty");
        return false;
    }
    if (password === "") {
        alert("password is empty");
        return false;
    }
    if (isSignUp && repeatPassword === "") {
        alert("confirm password is empty");
        return false;
    }
    return true;
};