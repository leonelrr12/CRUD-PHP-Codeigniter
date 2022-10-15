<?= $header; ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Datos del nuevo libro</h4>
        <p class="card-text">

        <form action="<?=site_url('/guardar')?>" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="" class="form-label">Nombre</label>
          <input type="text" name="nombre" value="<?=old('nombre') ?>" class="form-control" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Imagen</label>
          <input type="file" name="imagen" id="" class="form-control" placeholder="">
        </div>

        <div class="mb-3 d-flex ">
            <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
            <a href="<?=site_url('listar') ?>" type="button" class="btn btn-warning btn-lg mx-4">Cancelar</a>
        </div>
    </form>

        </p>
    </div>
</div>
<?= $footer; ?>