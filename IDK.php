<?php
$conexion = new mysqli("localhost", "root", "", "cevicheria_prueba");

if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$puesto = $_POST['puesto'];

$sql = "INSERT INTO postulaciones (nombre, telefono, puesto) VALUES (?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sss", $nombre, $telefono, $puesto);

if ($stmt->execute()) {
  echo "✅ Postulación enviada correctamente.";
} else {
  echo "❌ Error al guardar: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
