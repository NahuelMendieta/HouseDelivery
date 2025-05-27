<?php
$conexion = new mysqli("localhost", "root", "", "house_delivery");
$resultado = $conexion->query("SELECT * FROM productos");
?>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Categoría</th>
    <th>Precio</th>
    <th>Imagen</th>
</tr>
<?php while ($row = $resultado->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['categoria']; ?></td>
    <td>$<?php echo $row['precio']; ?></td>
    <td><img src="uploads/<?php echo $row['imagen']; ?>" width="50"></td>
</tr>
<?php } ?>
</table>

<?php $conexion->close(); ?>
