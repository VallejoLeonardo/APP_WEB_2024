function operaciones(){
    let n1 = parseInt(document.getElementById("n1").value);
    let n2 = parseInt(document.getElementById("n2").value);
    let operacion = document.getElementById("tipo").value;

    if (isNumber(n1) && isNumber(n2)){
        let ope;
        switch(operacion){
            case "+": ope = n1 + n2; break;
            case "-": ope = n1 - n2; break;
            case "*": ope = n1 * n2; break;
            case "/": ope = n1 / n2; break;
            default: ope = "Operación no válida"; break;
        }
    escribir= document.getElementById("resultado");
    escribir.innerHTML = `<h3> La operacion fue: ${n1} ${operacion} ${n2} = ${ope}</h3>`;
    }
    else {
        let respuesta = document.getElementById("resultado");
        respuesta.innerHTML = `<h3>Ingresa solo números</h3>`;
    }
}

function isNumber(value) {
    return !isNaN(value) && isFinite(value);
}
