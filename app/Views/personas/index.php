<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="container mt-5">
    <h1 class="mb-4">Registro de Personas</h1>
    <a href="/personas/create" class="btn btn-primary mb-3">Agregar Persona</a>
    <ul class="list-group">
        <?php foreach ($personas as $persona): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $persona['nombre']; ?> - <?= $persona['email']; ?>
                <div>
                    <a href="/personas/edit/<?= $persona['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="/personas/delete/<?= $persona['id']; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
