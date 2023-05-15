<section class="create-product-container">
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-er"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>
  <div class="create-product-content">
    <div class="table-header">
      <!-- si no existe $product mostrar titlo por defecto caso contrario mostrar $product['nombre'] -->

      <?php if (!isset($product)) : ?>
        <h2>Agregar Producto</h2>
      <?php else : ?>
        <h2><?= $product['nombre'] ?></h2>
      <?php endif; ?>
      <div class="btn-add-product">
        <a href="<?= base_url('panel-control') ?>" class="btn btn-white">Volver al Gestor</a>
      </div>
    </div>

    <form class="form-content" enctype="multipart/form-data" action="<?= isset($product) ? base_url('producto/actualizar-producto') : base_url('producto/crear-producto') ?>" method="POST">
      <div class="form-content-inputs">
        <div class="first-row">
          <?php if (!isset($product)) : ?>
            <div class="form-input">
              <select class="form-select" aria-label="Default select example" id="status" name="status">
                <option selected value="SI">Activo</option>
                <option value="NO">Inactivo</option>
              </select>
            </div>
          <?php else : ?>
            <div class="form-input">
              <select class="form-select" aria-label="Default select example" id="status" name="status">
                <option value="SI" <?= ($product['estado'] == 'SI') ? 'selected' : '' ?>>Activo</option>
                <option value="NO" <?= ($product['estado'] == 'NO') ? 'selected' : '' ?>>Inactivo</option>
              </select>
            </div>
          <?php endif; ?>
          <div class="form-input">
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del Producto" value="<?= isset($product['nombre']) ? $product['nombre'] : '' ?>">
          </div>

          <div class="form-input">
            <input type="number" class="form-control" id="price" name="price" placeholder="Precio del Producto" value="<?= isset($product['precio']) ? $product['precio'] : '' ?>">
          </div>

        </div>

        <div class="second-row">
          <div class="form-input">
            <input class="form-control" type="file" id="formFile" name="image">
          </div>

          <div class="form-input">
            <select class="form-select" aria-label="Default select example" id="type" name="type">
              <option selected>Tipo de producto</option>
              <option value="1" <?= (isset($product['tipo_id']) && $product['tipo_id'] == '1') ? 'selected' : '' ?>>Premium</option>
              <option value="2" <?= (isset($product['tipo_id']) && $product['tipo_id'] == '2') ? 'selected' : '' ?>>Origen</option>
              <option value="3" <?= (isset($product['tipo_id']) && $product['tipo_id'] == '3') ? 'selected' : '' ?>>Sostenible</option>
            </select>
          </div>

          <div class="form-input">
            <select class="form-select" aria-label="Default select example" id="category" name="category">
              <option selected>Categoría</option>
              <option value="1" <?= (isset($product['categoria_id']) && $product['categoria_id'] == '1') ? 'selected' : '' ?>>Café en Grano</option>
              <option value="2" <?= (isset($product['categoria_id']) && $product['categoria_id'] == '2') ? 'selected' : '' ?>>Café Molido</option>
              <option value="3" <?= (isset($product['categoria_id']) && $product['categoria_id'] == '3') ? 'selected' : '' ?>>Café Soluble</option>
            </select>
          </div>
        </div>
        <div class="btn-actions">

          <?php if (!isset($product)) : ?>
            <button type="submit" class="btn btn-coffee">Guardar</button>
          <?php else : ?>
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <button type="submit" class="btn btn-coffee">Actualizar</button>
          <?php endif; ?>

          <div class="btn-cancel-product">
            <a href="<?= base_url('panel-control') ?>" class="btn btn-cancel">Cancelar</a>
          </div>
        </div>
      </div>
    </form>
  </div>

</section>