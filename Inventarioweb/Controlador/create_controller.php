<?php
include 'conexion.php';

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $rol = $_POST["id_rol"];
    $contraseña = $_POST["contraseña"];

    // Agregar esta línea para depurar
    if (empty($contraseña)) {
        die("La contraseña no se ha recibido."); // Esto detendrá la ejecución y mostrará un mensaje si la contraseña está vacía
    }

    $sql = "INSERT INTO users (name, email, age, id_rol, contraseña) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Cambia "ssi" a "ssiss" para incluir el rol y la contraseña
    $stmt->bind_param("ssiss", $name, $email, $age, $rol, $contraseña);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error: " . $stmt->error;
    }
    $stmt->close();
}

