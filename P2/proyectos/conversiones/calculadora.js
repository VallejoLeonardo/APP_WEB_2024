function convertir() {
    let cantidad = parseFloat(document.getElementById("cantidad").value);
    let tipo = document.getElementById("tipo").value;

    if (isNumber(cantidad)) {
        let resultado;
        let imagenSrc;
        switch(tipo) {
            case "pesos": 
                resultado = cantidad * 0.050; 
                imagenSrc = "..//img/pesos.png"; 
                break;
            case "dolares": 
                resultado = cantidad * 20.3; 
                imagenSrc = "..//img/dolar.png"; 
                break;
            case "euros": 
                resultado = cantidad * 1.08; 
                imagenSrc = "..//img/euro.png"; 
                break;
            case "Dolares": 
                resultado = cantidad * 0.92; 
                imagenSrc = "..//img/dolar.png"; // Cambia esta ruta a la imagen correspondiente
                break;
            default: 
                resultado = "Operación no válida"; 
                imagenSrc = ""; // No hay imagen para operación no válida
                break;
        }
        let escribir = document.getElementById("resultado");
        escribir.innerHTML = `<h3> La conversión fue: ${cantidad} ${tipo} = ${resultado} </h3>
                                <img src="${imagenSrc}" alt="${tipo}" style="float:left; margin-right:10px;">`;
    } else {
        let respuesta = document.getElementById("resultado");
        respuesta.innerHTML = `<h3>Ingresa solo números</h3>`;
        alert("Ingresa solo números");
    }
}

function isNumber(value) {
    return !isNaN(value) && isFinite(value);
}

