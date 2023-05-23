// este archivo evita que se ingresen datos con formato correcto para poder ingresarlo a la base de datos, caso contrario envia un mensaje alertando el error.
function dataCheck() {
    const CheckName = document.getElementById("name").value;
    const Checkalias = document.getElementById("alias").value;
    const CheckEmail = document.getElementById("email").value;
    const CheckRut = document.getElementById("RUT").value;
    const CheckRegion = document.getElementById("region").value;
    const CheckCandidato = document.getElementById("candidato").value;
    const regex = /@/;    
 
    if (CheckName == ""){alert("Para continuar debes indicar tu nombre y apellido")
    return false};
    if (CheckRut[CheckRut.length - 2]!= "-") {alert("el formato de rut no es valido")
    return false};
    if (Checkalias.length < 5) {alert("el alias debe ser mayor a 5 digitos")
    return false};
    if (!regex.test(CheckEmail)) {alert("El correo debe contener el símbolo @")
    return false};
    if (CheckRegion == "option1"){alert("Para continuar debes seleccionar la region donde vives")
    return false};
    if (CheckCandidato == "option1"){alert("Para continuar debes seleccionar 1 candidato")
    return false};
  
  }



