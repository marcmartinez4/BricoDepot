let precioConIva = parseFloat(document.getElementById("precioConIva").value);
let precioOriginal = precioConIva;
let btnPropina = document.getElementById("btnPropina");
let inputPropina = document.getElementById("inputPropina");
let total = document.getElementById("total");
let inputPrecioConIva = document.getElementById("inputPrecioConIva");

btnPropina.addEventListener('change', function() {
    inputPropina.readOnly = !btnPropina.checked;

    if (this.checked) {
        inputPropina.classList.remove("readonly");
    } else {
        inputPropina.classList.add("readonly");
    }
})

inputPropina.addEventListener('change', function() {
    let propina = parseFloat(inputPropina.value);
    total.innerHTML = "";
    let precioConIva = precioOriginal;
    precioConIva += (precioConIva*propina)/100;
    precioConIva = parseFloat(precioConIva.toFixed(2));
    total.innerHTML = precioConIva + " €";
    inputPrecioConIva.value = precioConIva; 

})