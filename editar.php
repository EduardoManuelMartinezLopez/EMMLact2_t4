<?php
require_once 'controlador/ControladorDestino.php';

$controlador = new ControladorDestino();
$controlador->ctrActualizarDestino();

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
    header('location: index.php');
    exit();
}

$destino = $controlador->ctrMostrarDestino($id);
if (!$destino) {
    header('location: index.php?mensaje=error');
    exit();
}
?>
<?php include 'vista/plantillas/header.php'; ?>

<div class="container">
    <h2 class="mb-4">Editar destino</h2>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'error'): ?>
        <div class="alert alert-danger">Ocurrió un error al actualizar, intenta de nuevo.</div>
    <?php endif; ?>

    <form method="POST" action="editar.php?id=<?php echo $destino['id_destino']; ?>" class="row g-3">
        <input type="hidden" name="id_destino" value="<?php echo $destino['id_destino']; ?>">

        <div class="col-md-8">
            <label class="form-label">Nombre del destino</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $destino['nombre']; ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">País</label>
            <input type="text" name="pais" class="form-control" value="<?php echo $destino['pais']; ?>" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Precio (USD)</label>
            <input type="number" step="0.01" min="0" name="precio" class="form-control" value="<?php echo $destino['precio']; ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Duración (días)</label>
            <input type="number" min="1" name="duracion_dias" class="form-control" value="<?php echo $destino['duracion_dias']; ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">URL de imagen</label>
            <input type="text" name="imagen" class="form-control" value="<?php echo $destino['imagen']; ?>">
        </div>

        <div class="col-12">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required><?php echo $destino['descripcion']; ?></textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Actualizar destino</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php include 'vista/plantillas/footer.php'; ?>
