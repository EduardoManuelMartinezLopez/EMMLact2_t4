<?php
require_once 'controlador/ControladorDestino.php';

$controlador = new ControladorDestino();
$controlador->ctrRegistrarDestino();
?>
<?php include 'vista/plantillas/header.php'; ?>

<div class="container">
    <h2 class="mb-4">Agregar nuevo destino</h2>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'error'): ?>
        <div class="alert alert-danger">Ocurrió un error al guardar, intenta de nuevo.</div>
    <?php endif; ?>

    <form method="POST" action="crear.php" class="row g-3">
        <div class="col-md-8">
            <label class="form-label">Nombre del destino</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">País</label>
            <input type="text" name="pais" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label class="form-label">Precio (USD)</label>
            <input type="number" step="0.01" min="0" name="precio" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Duración (días)</label>
            <input type="number" min="1" name="duracion_dias" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">URL de imagen</label>
            <input type="text" name="imagen" class="form-control" placeholder="https://...">
        </div>

        <div class="col-12">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required></textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">Guardar destino</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php include 'vista/plantillas/footer.php'; ?>
