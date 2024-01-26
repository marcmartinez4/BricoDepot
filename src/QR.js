let pedido_id = document.getElementById('pedido_id').value;

localStorage.setItem('pedido_id', pedido_id);
QR = document.getElementById('QR');
QR.src = 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=http://localhost/BricoDepot/?controlador=review&action=QR_pedido&pedido_id=${pedido_id}';