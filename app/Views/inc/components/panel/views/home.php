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
              <td>
                <a href="<?php echo base_url('producto/editar/' . $producto['id']); ?>" class="btn btn-warning text-white fs-4">Editar</a>
                <?php if ($user && isset($user['role_id']) && $user['role_id'] != 3) : ?>
                  <a href="<?php echo base_url('producto/eliminar'); ?>" class="btn btn-danger fs-4">Eliminar</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>