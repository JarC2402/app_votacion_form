function dataCheck() {
    const CheckName = document.getElementById("name").value;
    const Checkalias = document.getElementById("alias").value;
    const CheckEmail = document.getElementById("email").value;
    const CheckRut = document.getElementById("RUT").value;
    const regex = /@/;    
    
    if (CheckName == ""){alert("Para continuar debes indicar tu nombre y apellido")
    return false};
    if (CheckRut[CheckRut.length - 2]!= "-") {alert("el formato de rut no es valido")
    return false};
    if (Checkalias.length < 5) {alert("el alias debe ser mayor a 5 digitos")
    return false};
    if (!regex.test(CheckEmail)) {alert("El correo debe contener el símbolo @")
    return false}; 
  }

