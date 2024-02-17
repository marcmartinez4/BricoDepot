// Obtener el valor del ID del pedido del elemento del formulario
let pedido_id = document.getElementById('pedido_id').value;

// Almacenar el ID del pedido en el almacenamiento local del navegador
localStorage.setItem('pedido_id', pedido_id);

// Codificar el ID del pedido para su uso en la URL
let encodedId = encodeURIComponent(pedido_id);

// Obtener el elemento de la imagen del código QR
QR = document.getElementById('QR');

// Establecer la fuente de la imagen del código QR con el enlace generado
QR.src = "https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" + encodeURIComponent(`http://localhost/BricoDepot/?controlador=review&action=QR_pedido&pedido_id=${pedido_id}`);
