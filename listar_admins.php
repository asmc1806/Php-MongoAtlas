<?php
include 'conexion.php';

$collection = $db->selectCollection('admins');
$cursor = $collection->find([], ['sort' => ['fecha_asignacion' => -1]]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Administradores</title>
</head>
<body>

<h1>Administradores registrados</h1>

<table border="1" cellpadding="6">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Nivel</th>
            <th>Fecha de asignación</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach ($cursor as $doc): ?>
        <tr>
            <td><?= (string)$doc['_id'] ?></td>
            <td><?= htmlspecialchars($doc['nombre']) ?></td>
            <td><?= htmlspecialchars($doc['rol']) ?></td>
            <td><?= htmlspecialchars($doc['nivel_acceso']) ?></td>
            <td><?= htmlspecialchars($doc['fecha_asignacion']) ?></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<p>Fecha / hora del servidor: <?= date("Y-m-d H:i:s") ?></p>

<a href="registrar_admin.php">Registrar nuevo admin</a>

</body>
</html>
