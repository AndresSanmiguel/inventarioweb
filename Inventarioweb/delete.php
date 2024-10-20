<?php
include 'conexion.php';

$message = '';
$messageType = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "UPDATE users SET estado = 0 WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        $message = "Error al cambiar el estado del usuario: " . $conn->error;
        $messageType = "danger";
    }
} else {
    $message = "ID no proporcionado";
    $messageType = "warning";
}

if (!empty($message)):
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Estado de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-<?php echo $messageType; ?>" role="alert">
                    <?php echo $message; ?>
                </div>
                <a href="index.php" class="btn btn-primary">Volver al inicio</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
endif;
?>