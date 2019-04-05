document.write('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>');
function validar() {
    var nombre,apellidos,email,telefono,cp,estado,ciudad,colonia,calle,password,validatepass;
    var exMail,exPass ;
    exMail = /\w+@\w+\.+[a-z]/;
    exPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&._-])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/
    exText = /[A-Za-z]/;
    nombre = document.getElementById("nombre").value;
    apellidos = document.getElementById("apellidos").value;
    email = document.getElementById("email").value;
    telefono = document.getElementById("telefono").value;
    cp = document.getElementById("cp").value;
    estado = document.getElementById("estado").value;
    ciudad = document.getElementById("ciudad").value;
    colonia = document.getElementById("colonia").value;
    calle = document.getElementById("calle").value;
    password = document.getElementById("password").value;
    validatepass = document.getElementById("confirm").value;
    if(nombre === ""|| apellidos === ""|| email === ""|| telefono === ""|| cp === ""|| estado === ""|| ciudad === ""|| colonia === "" || calle === ""|| password === ""|| validatepass === ""){
        swal("Error", "Todos los campos son obligatorios", "error");
        return false;
    }
    else if(nombre.length>50){
        swal("Error", "El nombre es muy largo", "error");
        return false;
    }
    if(!exText.test(nombre)){
        swal("Error", "El nombre no es valido", "error");
        return false;
    }
    if(apellidos.length>50){
        swal("Error", "El apellido es muy largo", "error");
        return false;
    }
    if(!exText.test(apellidos)){
        swal("Error", "El nombre no es valido", "error");
        return false;
    }
    if(email.length>50){
        swal("Error", "El correo es muy largo", "error");
        return false;
    }
    if(!exMail.test(email)){
        swal("Error", "El correo no es valido", "error");
        return false;
    }
    if(telefono.length>15){
        swal("Error", "El telefono no es valido", "error");
        return false;
    }
    if(isNaN(telefono)){
        swal("Error", "Favor de ingresar un número telefonico correcto\n ejemplo: 2342349584  ", "error");
        return false;
    }
    if(cp.length>5){
        swal("Error", "El código postal no es valido", "error");
        return false;
    }
    if(isNaN(cp)){
        swal("Error", "Favor de ingresar un código postal valido\n ejemplo: 72734 ", "error");
        return false;
    }
    if(estado.length>50){
        swal("Error", "El nombre del estado es muy largo", "error");
        return false;
    }
    if(!exText.test(estado)){
        swal("Error", "El nombre del estado no es valido", "error");
        return false;
    }
    if(ciudad.length>25){
        swal("Error", "El nombre de la ciudad es muy largo", "error");
        return false;
    }
    if(!exText.test(ciudad)){
        swal("Error", "El nombre de la ciudad no es valido", "error");
        return false;
    }
    if(colonia.length>45){
        swal("Error", "El nombre de la colonia es muy largo", "error");
        return false;
    }
    if(calle.length>45){
        swal("Error", "El nombre de la calle es muy largo", "error");
        return false;
    }
    if(password.length>45){
        swal("Error", "La contraseña  es muy larga", "error");
        return false;
    }
    if(!exPass.test(password)){
        swal("Error", "La contraseña debe tener: \nMinimo 8 caracteres y un maximo de 15.\nAl menos una letra mayúscula.\nAl menos una letra minuscula.\nAl menos un dígito.\nAl menos un caracter especial.\nNo espacios en blanco.\n\nPara ver la contraseña puede dar clic sobre ella.", "error");
        return false;
    }
    if(password !== validatepass){
        swal("Error", "Las contraseñas no coinciden", "error");
        return false;
    }
}
function validarLogin() {
    var username,passw;
    username = document.getElementById("username").value;
    passw = document.getElementById("passw").value;
    var exMail ;
    exMail = /\w+@\w+\.+[a-z]/;
    if(username === "" || passw === ""){
        swal("Error", "Todos los campos son obligatorios", "error");
        return false;
    }
    if(!exMail.test(username)){
        swal("Campo incorrecto", "Tu usuario es tu correo", "warning");
        return false;
    }
}
