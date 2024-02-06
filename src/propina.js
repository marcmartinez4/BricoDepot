let btnPropina = document.getElementById("btnPropina");
let inputPropina = document.getElementById("inputPropina");
let total = document.getElementById("total");
let inputPrecioConIva = document.getElementById("inputPrecioConIva");
let precioConIvaOriginal = parseFloat(inputPrecioConIva.value);

function calcularPrecioConPropina() {
    let precioConIva = precioConIvaOriginal;
    let propina = parseFloat(inputPropina.value);
    
    if (btnPropina.checked) {
        precioConIva += (precioConIva * propina) / 100;
    }
    
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

inputPropina.addEventListener('input', function() {
    calcularPrecioConPropina();
});

calcularPrecioConPropina();
