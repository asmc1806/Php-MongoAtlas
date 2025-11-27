<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = $_POST['nombre'];
    $rol = $_POST['rol'];
    $nivel = $_POST['nivel'];
    $fecha = $_POST['fecha'];


    $collection = $db->selectCollection('admins');

    $doc = [
        'nombre' => $nombre,
        'rol' => $rol,
        'nivel_acceso' => $nivel,
        'fecha_asignacion' => $fecha  
    ];

    $result = $collection->insertOne($doc);

    if ($result->getInsertedId()) {
        $success = "Administrador registrado correctamente.";
    } else {
        $error = "Error al insertar.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrar Admin</title>
</head>
<body>

<h1>Registrar Administrador de Red</h1>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?=$error?></p>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <p style="color:green;"><?=$success?></p>
<?php endif; ?>

<form method="post">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Rol:</label><br>
    <select name="rol">
        <option value="Seguridad">Seguridad</option>
        <option value="Base de datos">Base de datos</option>
        <option value="Infraestructura">Infraestructura</option>
        <option value="Soporte">Soporte</option>
    </select><br><br>

    <label>Nivel acceso:</label><br>
    <input type="number" name="nivel" min="1" max="5" value="1"><br><br>

    <label>Fecha de asignación:</label><br>
    <input type="date" name="fecha" value="<?=date('Y-m-d')?>"><br><br>

    <button type="submit">Registrar</button>
</form>

<hr>
<a href="listar_admins.php">Ver lista de administradores</a>

</body>
</html>
