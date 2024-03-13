function validatelogin(){
    RemoveAllErrorMessage();
    var pass=document.getElementById('pass').value;
    var PasswordValidationMessage;
    
    PasswordValidationMessage=isvalidpassword(pass);
    if(PasswordValidationMessage!= "Valid"){
        ShowErrorMessage('pass',PasswordValidationMessage);
        return false;
    }
    return true;
}

function isvalidpassword(password){
    const minlength=8;
    const maxlength=32;
    const letterNumberRegexSpecialChar = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,}$/;
    if(password==""){
        return "please fill the field";
    }
    if(password.length < minlength || password.length > maxlength){
        return "Password length should be min 8 and max 32 characters";
    }
    if(letterNumberRegexSpecialChar.test(password)==false){
        return "Password Should contain alphabet,numeric and special character.";
    }
    return "Valid";
}
function ShowErrorMessage(InputBoxId,Message){
    var InputBox = document.getElementById(InputBoxId);
    InputBox.classList.add('error-input')
        var ErrorMessageElement = document.getElementById('p');
        ErrorMessageElement.classList.add('error-message');
        ErrorMessageElement.innerHTML = "Please fill the field";

    InputBox.parentNode.insertBefore(ErrorMessageElement,InputBox.nextSibling);
}