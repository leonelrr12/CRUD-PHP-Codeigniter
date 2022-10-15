<?= $header; ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Editar datos del libro</h4>
        <p class="card-text">

        <form action="<?=site_url('/actualizar')?>" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="" class="form-label">Nombre</label>
          <input type="text" name="nombre" id="" class="form-control" value="<?=$libro['nombre'] ?>">
        </div>
        <div class="mb-3">
        <img class="img-thumbnail" src="<?= base_url(); ?>/uploads/<?=$libro['imagen']; ?>" width="100" alt="") />
        <br />
          <label for="" class="form-label">Imagen</label>
          <input type="file" name="imagen" id="" class="form-control" value="<?=$libro['imagen'] ?>">
        </div>
        <input type="hidden" name="id" value="<?=$libro['id'] ?>">

        <div class="mb-3 d-flex ">
            <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
            <a href="<?=site_url('listar') ?>" type="button" class="btn btn-warning btn-lg mx-4">Cancelar</a>
        </div>
    </form>

        </p>
    </div>
</div>
<?= $footer; ?>