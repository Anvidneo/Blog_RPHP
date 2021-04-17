export function validateEmail(mail) {
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail)){
        return (true)
    } else {
        return (false)
    }
}

export function validateText(text) {
    text = String(text)
    if (/[A-Za-z]/.test(text)){
        return (true)
    } else {
        return (false)
    }
}

export function validatePhone(phone) {
    if (/^\d{10}$/.test(phone)){
      return (true)
    } else {
        return (false);
    }
}

export function validatePass(pass) {
    if(pass.length >= 8){		
        let mayuscula = false;
        let minuscula = false;
        let numero = false;
        let caracter_raro = false;
        
        for(let i = 0;i<pass.length;i++){
            if (pass.charCodeAt(i) >= 65 && pass.charCodeAt(i) <= 90){
                mayuscula = true;
            }
            else if (pass.charCodeAt(i) >= 97 && pass.charCodeAt(i) <= 122){
                minuscula = true;
            }
            else if (pass.charCodeAt(i) >= 48 && pass.charCodeAt(i) <= 57){
                numero = true;
            }
            else{
                caracter_raro = true;
            }
        }
        if (mayuscula === true && minuscula === true && caracter_raro === true && numero === true){
            return true;
        }
    }
    return false;
}

