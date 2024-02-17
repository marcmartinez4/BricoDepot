// Variables para los elementos del DOM
let btnPropina = document.getElementById("btnPropina");
let inputPropina = document.getElementById("inputPropina");

let btnPuntos = document.getElementById("btnPuntos");
let inputPuntos = document.getElementById("inputPuntos");

let total = document.getElementById("total");
let inputPrecioConIva = document.getElementById("inputPrecioConIva");
let inputPropinaFinalizar = document.getElementById("inputPropinaFinalizar");
let inputPuntosFinalizar = document.getElementById("inputPuntosFinalizar");

// Otras variables
let puntosUsados = 0;
let precioConIvaOriginal = parseFloat(inputPrecioConIva.value);
let puntosUsuario = parseFloat(document.getElementById("puntosUsuario").value);

// Configuración del inputPuntos
inputPuntos.max = puntosUsuario;

// Función para calcular el precio con propina
function calcularPrecioConPropina() {
    let precioConIva = precioConIvaOriginal;
    let propina = parseFloat(inputPropina.value);
    
    // Aplicar propina si el botón está seleccionado
    if (btnPropina.checked) {
        precioConIva += (precioConIva * propina) / 100;
    }
    
    // Calcular descuento por puntos
    let puntos = parseFloat(inputPuntos.value);
    let eurosDescuento = Math.floor(puntos / 100);
    let descuentoPorPuntos = eurosDescuento * 1; 
    precioConIva -= descuentoPorPuntos; 
    
    // Verificar que el precio con IVA no sea menor que 0
    if (precioConIva < 0) {
        precioConIva = 0;
    }

    // Actualizar valores en el DOM
    inputPrecioConIva.value = precioConIva; 
    puntosUsados = puntos;
    inputPuntosFinalizar.value = puntosUsados;

    total.innerHTML = precioConIva.toFixed(2) + " €";
    localStorage.setItem('puntosUsados', puntosUsados);
    localStorage.setItem('precioConIva', precioConIva);
}


// Event listeners para cambios en los botones de propina y puntos
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

// Event listener para cambios en el input de propina
inputPropina.addEventListener('input', function() {
    calcularPrecioConPropina();
    inputPropinaFinalizar.value = inputPropina.value;
});

// Event listener para cambios en el input de puntos
inputPuntos.addEventListener('input', function() {
    calcularPrecioConPropina(); 
});

// Establecer el valor inicial de inputPropinaFinalizar
inputPropinaFinalizar.value = inputPropina.value;

// Calcular el precio con propina al cargar la página
calcularPrecioConPropina();

// Event listener para finalizar el pedido
finalizarPedido.addEventListener("click", function() {
    let puntosFinalizar = puntosUsados;

    fetch('http://localhost/BricoDepot/?controlador=API&action=modificarPuntos', {
        method: 'POST',
        body: JSON.stringify({
            puntosFinalizar: puntosFinalizar,
        }),
        headers: {
            'Content-Type': 'application/json; charset=UTF-8',
        }
    })
});
