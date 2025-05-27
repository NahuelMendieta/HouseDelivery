<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "house_delivery");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['productName'];
$categoria = $_POST['category'];
$precio = $_POST['price'];

// Guardar imagen en carpeta 'uploads/'
$imagenNombre = $_FILES['image']['name'];
$rutaDestino = "uploads/" . $imagenNombre;
move_uploaded_file($_FILES['image']['tmp_name'], $rutaDestino);

// Insertar en la base de datos
$sql = "INSERT INTO productos (nombre, categoria, precio, imagen) 
        VALUES ('$nombre', '$categoria', '$precio', '$imagenNombre')";

if ($conexion->query($sql) === TRUE) {
    header("Location: misProductos.php"); // Redirige después de guardar
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>
