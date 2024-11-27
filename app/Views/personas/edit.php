<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="container mt-5">
    <h1>Editar Persona</h1>
    <!-- Mostrar errores -->
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors(); ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/personas/update/<?= $persona['id']; ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= old('nombre', $persona['nombre']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email', $persona['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="<?= old('telefono', $persona['telefono']); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="/personas" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
