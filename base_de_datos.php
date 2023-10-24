<?php
    $conexión = new mysqli('localhost', 'root', '', 'restaurante');

    if ($conexión->connect_error) {
        die("Conexión fallida: " . $conexión->connect_error);
    }

    $sql = "SELECT * FROM productos";
    $resultado = $conexión->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Id</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Categoria</th><th></th><th></th></tr>";
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["producto_id"] . "</td>";
            echo "<td>" . $row["nombre_producto"] . "</td>";
            echo "<td>" . $row["descripcion"] . "</td>";
            echo "<td>" . $row["precio_unidad"] . "</td>";
            echo "<td>" . $row["categoria_id"] . "</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados en la tabla.";
    }

    $conexión->close();
?>
