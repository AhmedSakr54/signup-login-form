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

/*
    front-end validation
    checks if any of the input fields is empty and shows corresponding error message
*/
const validateForm = () => {
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#password").value;
    const errorParagraph = document.querySelector("#err-paragraph");
    let success = true;
    errorParagraph.innerHTML = "";

    let isSignUp = false;
    let fullName = document.querySelector("#fullname");
    let repeatPassword = document.querySelector("#repeat-password");

    if (checkIfSignUpOrLogin(fullName, repeatPassword)) {
        fullName = fullName.value;
        repeatPassword = repeatPassword.value;
        isSignUp = true;
    }
    if (isSignUp && fullName === "") {
        errorParagraph.innerHTML += "Empty Full Name Field.<br>";
        success = false;
    }
    if (email === "") {
        errorParagraph.innerHTML += "Empty Email Field.<br>";
        success = false;
    }
    if (password === "") {
        errorParagraph.innerHTML += "Empty Password Field.<br>";
        success = false;
    }
    if (isSignUp && repeatPassword === "") {
        errorParagraph.innerHTML += "Empty Confirm Password Field.<br>";
        success = false;
    }
    if (!success) {
        errorParagraph.classList.replace("hide", "show");
        errorParagraph.classList.replace("success", "error");
        return false;
    }
    return true;
};

const reloadForm = () => {
    const email = document.querySelector("#email");
    const password = document.querySelector("#password");
    const fullName = document.querySelector("#fullname");
    const repeatPassword = document.querySelector("#repeat-password");
    email.value = "";
    password.value = "";
    fullName.value = "";
    repeatPassword.value = "";
};

const form = document.getElementById("postForm");
const validateFormAjax = (e) => {
    e.preventDefault();
    const errorParagraph = document.querySelector("#err-paragraph");
    if (!validateForm()) {
        return;
    }
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#password").value;

    let fullName = document.querySelector("#fullname");
    let repeatPassword = document.querySelector("#repeat-password");
    let isSignUp = false;
    let path = 'helper/login_check.php';

    if (checkIfSignUpOrLogin(fullName, repeatPassword)) {
        fullName = fullName.value;
        repeatPassword = repeatPassword.value;
        isSignUp = true;
        path = 'helper/signup_check.php';
    }
    let requestData;
    requestData = new FormData();
    requestData.append("email", email);
    requestData.append("password", password);
    requestData.append("submit", "submit");
    if (isSignUp) {
        requestData.append("fullname", fullName);
        requestData.append("confirm_password", repeatPassword);
    }
    // AJAX part 
    const xhr = new XMLHttpRequest();
    xhr.open('POST', path, true);
    xhr.onload = () => {
        errorParagraph.innerHTML = xhr.responseText;
        errorParagraph.classList.replace("hide", "show");
        if (errorParagraph.innerHTML == "Registration Successful") {
            errorParagraph.classList.replace("error", "success");
            if (isSignUp)
                reloadForm();
        } else if (errorParagraph.innerHTML == "") {
            window.location.href = "loggedin.php";
        } else
            errorParagraph.classList.replace("success", "error");
    };
    xhr.send(requestData);
};
form.addEventListener("submit", validateFormAjax);