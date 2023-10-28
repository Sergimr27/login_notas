//Funcion para validar por JS el login
function validarPassword() {
    //declaramos variables para recoger los valores del login y para vincular elementos html con variables
    var username = document.getElementById('username').value;
    var password = document.getElementById('passwd').value;
    var errorU = document.getElementById('errorU');
    var errorP = document.getElementById('errorP');
    //Estaran vacias si no entran por el condicional
    errorP.textContent = "";
    errorU.textContent = "";
    //Si el usuario esta vacio
    if (!username || username === "") {
        errorU.textContent = "El usuario esta vacio";
        if (!password || password === "") {
            //escribimos esto en el html
            errorP.textContent = "El password esta vacio";
        }
        return false;
    }
    //Si el usuario esta vacio
    else if (!password || password === "") {
        //escribimos esto en el html
        errorP.textContent = "El password esta vacio";
        return false;
    }
    //Si el password tiene mas de 9 digitos
    else if (password.length > 9) {
        //escribimos esto en el html
        errorP.textContent = "El password es muy grande";
        return false;
    }
    //Nos devuelve al Login
    else {
        return true;
    }
}