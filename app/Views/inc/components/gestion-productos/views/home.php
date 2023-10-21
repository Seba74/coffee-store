<section class="panel-container">
  <?php if (session()->getFlashdata('success')) : ?>
    <div id="success-message" class="alert alert-success success-message"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <div class="panel-products-container">
    <div class="table-header">
      <h2>Productos</h2>
      <div class="btn-add-product">
        <a href="<?= base_url('producto/agregar') ?>" class="btn btn-white">Agregar Producto</a>
      </div>
    </div>
    <div class="panel-tools">
      <div class="search-container">
        <form>
          <input type="text" placeholder="Buscar producto...">
          <button type="submit">
            <i class="fal fa-mug-hot"></i>
          </button>
        </form>
      </div>
      <?php if (!$isMobile) : ?>
        <div class="filter-container">
          <form id="filter-form" action="<?= base_url("producto/filtrar/1"); ?>" method="POST">
            <div class="filter-content">
              <div class="order-by">
                <div class="label">
                  <h4>Ordenar Por</h4>
                </div>
                <select name="orderBy">
                  <option value="1" <?= $filters['orderBy'] == 1 ? 'selected' : '' ?>>Precio menor</option>
                  <option value="2" <?= $filters['orderBy'] == 2 ? 'selected' : '' ?>>Precio mayor</option>
                </select>
              </div>
              <div class="order-by">
                <div class="label">
                  <h4>Tipo de Café</h4>
                </div>
                <select name="tipo">
                  <option value="0" <?= $filters['tipoCafe'] == 0 ? 'selected' : '' ?>>Todos</option>
                  <option value="1" <?= $filters['tipoCafe'] == 1 ? 'selected' : '' ?>>Línea Premium</option>
                  <option value="2" <?= $filters['tipoCafe'] == 2 ? 'selected' : '' ?>>Línea Origen</option>
                  <option value="3" <?= $filters['tipoCafe'] == 3 ? 'selected' : '' ?>>Línea Sostenible</option>
                </select>
              </div>
              <div class="order-by">
                <div class="label">
                  <h4>Categoría</h4>
                </div>
                <select name="categoria">
                  <option value="0" <?= $filters['categoria'] == 0 ? 'selected' : '' ?>>Todos</option>
                  <option value="1" <?= $filters['categoria'] == 1 ? 'selected' : '' ?>>Café en Grano</option>
                  <option value="2" <?= $filters['categoria'] == 2 ? 'selected' : '' ?>>Café Molido</option>
                  <option value="3" <?= $filters['categoria'] == 3 ? 'selected' : '' ?>>Café Soluble</option>
                </select>
              </div>
              <div class="order-by">
                <div class="label">
                  <h4>Estado</h4>
                </div>
                <select name="estado">
                  <option value="0" <?= $filters['estado'] == 0 ? 'selected' : '' ?>>Todos</option>
                  <option value="1" <?= $filters['estado'] == 1 ? 'selected' : '' ?>>Activos</option>
                  <option value="2" <?= $filters['estado'] == 2 ? 'selected' : '' ?>>Inactivos</option>
                </select>
              </div>
              <div class="form-footer-section">
                <button type="submit" class="btn btn-coffee btn-block">Aplicar Filtros</button>
              </div>
            </div>
          </form>
        </div>
      <?php endif; ?>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-content">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tipo</th>
            <th scope="col">Estado</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($productos as $producto) : ?>
            <tr>
              <th scope="row"><?php echo $producto['id']; ?></th>
              <td><?php echo $producto['nombre']; ?></td>
              <td>$<?php echo $producto['precio']; ?></td>
              <td><?php echo $producto['categoria_nombre']; ?></td>
              <td><?php echo $producto['tipo_nombre']; ?></td>
              <td><?php echo $producto['estado'] == 'SI' ? 'Activo' : 'Inactivo' ?></td>
              <td class="btn-table-actions">
                <a href="<?php echo base_url('producto/editar/' . $producto['id']); ?>" class="btn btn-warning text-white fs-4">Editar</a>
                <?php if ($user && isset($user['role_id']) && $user['role_id'] != 3) : ?>
                  <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-danger fs-4">Eliminar</a>
                <?php endif; ?>
              </td>
            </tr>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-2" id="staticBackdropLabel">Eliminar Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ¿Estas seguro que deseas eliminar este producto?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cerrar</button>
                    <a type="button" class="btn btn-danger btn-delete" href="<?php echo base_url('producto/eliminar/' . $producto['id']); ?>">Eliminar</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>