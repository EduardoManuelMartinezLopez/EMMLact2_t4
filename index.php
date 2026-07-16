<?php
require_once 'controlador/ControladorDestino.php';

$controlador = new ControladorDestino();

if (isset($_GET['idEliminar'])) {
    $controlador->ctrEliminarDestino();
}

$destinos = $controlador->ctrMostrarDestinos();
?>
<?php include 'vista/plantillas/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="m-0">Catálogo de destinos</h2>
        <a href="crear.php" class="btn btn-success">+ Nuevo destino</a>
    </div>

    <?php
    $mensajes = array(
        'creado'      => array('success', 'Destino registrado correctamente.'),
        'actualizado' => array('success', 'Destino actualizado correctamente.'),
        'eliminado'   => array('success', 'Destino eliminado correctamente.'),
        'error'       => array('danger', 'Ocurrió un error, intenta de nuevo.'),
    );
    if (isset($_GET['mensaje']) && isset($mensajes[$_GET['mensaje']])):
        $tipo = $mensajes[$_GET['mensaje']][0];
        $texto = $mensajes[$_GET['mensaje']][1];
    ?>
        <div class="alert alert-<?php echo $tipo; ?>"><?php echo $texto; ?></div>
    <?php endif; ?>

    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>País</th>
                <th>Precio</th>
                <th>Duración</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($destinos) == 0): ?>
                <tr>
                    <td colspan="8" class="text-center">No hay destinos registrados todavía.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($destinos as $destino): ?>
                <tr>
                    <td><?php echo $destino['id_destino']; ?></td>
                    <td>
                        <img src="<?php echo $destino['imagen']; ?>" width="70" height="50" style="object-fit:cover;" class="rounded">
                    </td>
                    <td><?php echo $destino['nombre']; ?></td>
                    <td><?php echo $destino['pais']; ?></td>
                    <td>$<?php echo number_format($destino['precio'], 2); ?></td>
                    <td><?php echo $destino['duracion_dias']; ?> días</td>
                    <td><?php echo substr($destino['descripcion'], 0, 60); ?>...</td>
                    <td class="text-nowrap">
                        <a href="editar.php?id=<?php echo $destino['id_destino']; ?>" class="btn btn-sm btn-primary">Editar</a>
                        <a href="index.php?idEliminar=<?php echo $destino['id_destino']; ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('¿Seguro que quieres eliminar este destino?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'vista/plantillas/footer.php'; ?>
