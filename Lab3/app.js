const checkIfSignUpOrLogin = (fullName, repeatPassword) => {
    if (fullName === null && repeatPassword === null)
        return false;
    return true;
}

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
}