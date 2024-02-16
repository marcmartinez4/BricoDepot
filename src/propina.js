let btnPropina = document.getElementById("btnPropina");
let inputPropina = document.getElementById("inputPropina");

let btnPuntos = document.getElementById("btnPuntos");
let inputPuntos = document.getElementById("inputPuntos");
let puntosUsados = 0; // Inicializar en 0

let total = document.getElementById("total");
let inputPrecioConIva = document.getElementById("inputPrecioConIva");
let precioConIvaOriginal = parseFloat(inputPrecioConIva.value);
let inputPropinaFinalizar = document.getElementById("inputPropinaFinalizar");
let inputPuntosFinalizar = document.getElementById("inputPuntosFinalizar");

let puntosUsuario = parseFloat(document.getElementById("puntosUsuario").value);
inputPuntos.max = puntosUsuario;

function calcularPrecioConPropina() {
    let precioConIva = precioConIvaOriginal;
    let propina = parseFloat(inputPropina.value);
    
    if (btnPropina.checked) {
        precioConIva += (precioConIva * propina) / 100;
    }
    
    let puntos = parseFloat(inputPuntos.value);
    let eurosDescuento = Math.floor(puntos / 100);
    let descuentoPorPuntos = eurosDescuento * 1; 
    precioConIva -= descuentoPorPuntos; 

    inputPrecioConIva.value = precioConIva; 
    puntosUsados = puntos; // Actualizar puntosUsados
    inputPuntosFinalizar.value = puntosUsados; // Actualizar inputPuntosFinalizar

    total.innerHTML = precioConIva.toFixed(2) + " €";
}

btnPropina.addEventListener('change', function() {
    inputPropina.readOnly = !btnPropina.checked;

    if (this.checked) {
        inputPropina.classList.remove("readonly");
    } else {
        inputPropina.classList.add("readonly");
    }

    calcularPrecioConPropina();
});

btnPuntos.addEventListener('change', function() {
    inputPuntos.readOnly = !btnPuntos.checked;

    if (this.checked) {
        inputPuntos.classList.remove("readonly");
    } else {
        inputPuntos.classList.add("readonly");
    }

    calcularPrecioConPropina();
});

inputPropina.addEventListener('input', function() {
    calcularPrecioConPropina();
    inputPropinaFinalizar.value = inputPropina.value;
});

inputPuntos.addEventListener('input', function() {
    calcularPrecioConPropina(); 
});

inputPropinaFinalizar.value = inputPropina.value;

calcularPrecioConPropina();
