<?= $header; ?>
<div class="my-3 d-flex justify-content-between">
    <h2 class="">Lista de libros</h2>
    <a class="btn btn-primary" href="<?=base_url('crear')?>" role="button">Crear nuevo libro</a>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($libros as $libro) : ?>
                <tr>
                    <td><?= $libro['id']; ?></td>
                    <td>
                        <img class="img-thumbnail" src="<?= base_url(); ?>/uploads/<?=$libro['imagen']; ?>" width="100" alt="") />
                    </td>
                    <td><?= $libro['nombre']; ?></td>
                    <td>
                        <a class="btn btn-info btn-sm " href="<?=base_url('editar/'.$libro['id']); ?>" role="button">Editar</a>
                        <a class="btn btn-danger btn-sm " href="<?=base_url('borrar/'.$libro['id']); ?>" role="button">Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $footer; ?>