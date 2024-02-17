# Introducción

En este proyecto, hemos implementado en nuestra página de restauración una serie de funcionalidades diseñadas para mejorar la experiencia del usuario y optimizar los procesos de pedido. Estas características incluyen una página de reseñas, un sistema de puntos y propinas, un QR para visualizar el pedido y un filtro de productos usando JavaScript y PHP.


# Reseñas
La página de reseñas se encarga de mostrar todas las opiniones que han dejado los usuarios en la página. Estas reseñas se pueden filtrar por puntuación y de ascendente a descendente.
Esto se ha conseguido mediante JavaScript y PHP. 
Con JavaScript se ha creado tanto la función de mostrar las reseñas como los filtros y con PHP se han creado las funciones para recoger o insertar las reseñas en la base de datos.

## Añadir Reseñas
Al finalizar un pedido se redirige automáticamente a una página la cual contiene un QR y un botón el cual activa el formulario para añadir reseñas.
El código par añadir reseñas primero recoge todos los datos necesarios como el nombre, el apellido, la reseña, ... si no se recogen estos datos salta una alerta la cual nos hace saber que el proceso ha fallado y la reseña no se ha insertado.
Después se obtiene la fecha actual ya que esta también se insertará en la reseña.
Una vez recogidos todos los datos se utiliza fetch para enviar todos los datos de la nueva reseña en formato JSON.
Si todo funciona correctamente salta una notificación la cual nos hace saber que la reseña se ha insertado correctamente.

## Mostrar Reseñas
Primero se hace una solucitud con fetch para recoger todas las reseñas y después se convierten a formato JSON.
Posteriormente se extraen los elementos del HTML necesarios como los filtros y luego se muestran las reseñas.
El código también contiene eventos de escuchas los cuales modifican las reseñas que se muestran o como se muestran cuando uno de los filtros es usado.
Además, la cantidad de estrellas que se muestran en la reseña se modifica en base a la puntuación de esta.


# QR
El QR se encarga de redirigir a una página con la información de el pedido correspondiente.
Primero se obtiene el ID del pedido en cuestión y después se utiliza una api la cual genera un QR con un enlace que redirige a la vista de la información del pedido además de guardar el ID del pedido.
Una vez cargada la vista el cliente obtendrá información de este pedido como su estado, el precio total, la fecha de este, ...


# Propina y Puntos
La propina y los puntos son dos partes del carrito. La propina es un añadido al precio final el cual es de un 3% por defecto la cual el cliente puede desactivar. Los puntos sirven para rebajar el precio final.
Primero se obtienen los botones, los inputs con los valores necesarios, ...
Después se establece que el limite de puntos que el usuario puede utilizar no sea mayor que los puntos que este tiene en su cuenta.
Se define la funcion que se encarga de calcular el precio del pedido con la propina aplicada y el descuento por puntos actualizando estos valores según se van modificando.
Y una vez finalizado el pedido se envian mediante fetch los puntos que se le deben restar al cliente a una función PHP que se encarga de restarlos. 


# Carta
Para mostrar los productos de la carta se sigue el mismo proceso que con las reseñas. Primero se hace una solicitud con fetch para recoger todos los productos y después se convierten a formato JSON.
Después se buscan los elementos necesarios en el HTML como los filtros y el lugar donde se muestran las reseñas.
Al principio se muestran todos los productos sin ningun tipo de filtro y, si mas tarde decidimos filtrar por categorias, los productos se mostraran según la categoría que hayamos escogido usando los eventos de escucha.
