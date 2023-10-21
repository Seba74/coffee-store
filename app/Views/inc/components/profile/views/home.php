<section class="profile-section form-container">

  <?php if (session()->getFlashdata('successBuying')) : ?>
    <div id="success-message" class="alert alert-success welcome-message"><?= session()->getFlashdata('successBuying') ?></div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('success')) : ?>
    <div id="success-message" class="alert alert-success welcome-message"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('errorEmpty')) : ?>
    <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorEmpty') ?></div>
  <?php endif; ?>

  <div class="profile-content">
    <div class="col-4 list-content">
      <div id="list-example" class="list-group">
        <a class="list-group-item list-group-item-action" href="#personal-data">Datos Personales</a>
        <a class="list-group-item list-group-item-action" href="#domicilio-data">Datos de Domicilio</a>
        <a class="list-group-item list-group-item-action" href="#pedidos-data">Pedidos</a>
        <a class="list-group-item list-group-item-action" href="#pago-data">Metodos de envio</a>
      </div>
    </div>
    <div class="info-container col-8">
      <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example scrollspy-container" tabindex="0">
        <div id="personal-data" class="info-content">

          <div class="title-section">
            <h1 class="title">Datos Personales</h1>
          </div>

          <form class="form-content" action="<?= base_url('usuario/domicilio') ?>" method="POST">

            <div class="first-section-profile">
              <div class="input-text mb-3">
                <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="<?= $domicilioData ? $domicilioData['calle'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero" value="<?= $domicilioData ? $domicilioData['numero'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?= $domicilioData ? $domicilioData['ciudad'] : '' ?>">
              </div>
            </div>

            <div class="second-section-profile">
              <div class="input-text mb-3">
                <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais" value="<?= $domicilioData ? $domicilioData['pais'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Codigo Postal" value="<?= $domicilioData ? $domicilioData['codigo_postal'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?= $domicilioData ? $domicilioData['telefono'] : '' ?>">
              </div>
            </div>

            <div class="form-footer-section">
              <button type="submit" class="btn btn-coffee btn-block">Actualizar</button>
            </div>
          </form>
        </div>
        <div id="domicilio-data" class="info-content">

          <div class="title-section">
            <h1 class="title">Datos de Domicilio</h1>
          </div>

          <form class="form-content" action="<?= base_url('usuario/domicilio') ?>" method="POST">

            <div class="first-section-profile">
              <div class="input-text mb-3">
                <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="<?= $domicilioData ? $domicilioData['calle'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero" value="<?= $domicilioData ? $domicilioData['numero'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?= $domicilioData ? $domicilioData['ciudad'] : '' ?>">
              </div>
            </div>

            <div class="second-section-profile">
              <div class="input-text mb-3">
                <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais" value="<?= $domicilioData ? $domicilioData['pais'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Codigo Postal" value="<?= $domicilioData ? $domicilioData['codigo_postal'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?= $domicilioData ? $domicilioData['telefono'] : '' ?>">
              </div>
            </div>

            <div class="form-footer-section">
              <button type="submit" class="btn btn-coffee btn-block">Actualizar</button>
            </div>
          </form>


        </div>
        <div id="pedidos-data" class="info-content">

          <div class="title-section">
            <h1 class="title">Mis Pedidos</h1>
          </div>

          <form class="form-content" action="<?= base_url('usuario/domicilio') ?>" method="POST">

            <div class="first-section-profile">
              <div class="input-text mb-3">
                <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="<?= $domicilioData ? $domicilioData['calle'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero" value="<?= $domicilioData ? $domicilioData['numero'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?= $domicilioData ? $domicilioData['ciudad'] : '' ?>">
              </div>
            </div>

            <div class="second-section-profile">
              <div class="input-text mb-3">
                <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais" value="<?= $domicilioData ? $domicilioData['pais'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Codigo Postal" value="<?= $domicilioData ? $domicilioData['codigo_postal'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?= $domicilioData ? $domicilioData['telefono'] : '' ?>">
              </div>
            </div>

            <div class="form-footer-section">
              <button type="submit" class="btn btn-coffee btn-block">Actualizar</button>
            </div>
          </form>


        </div>
        <div id="pago-data" class="info-content">

          <div class="title-section">
            <h1 class="title">Metodo de Pago</h1>
          </div>

          <form class="form-content" action="<?= base_url('usuario/domicilio') ?>" method="POST">

            <div class="first-section-profile">
              <div class="input-text mb-3">
                <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="<?= $domicilioData ? $domicilioData['calle'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero" value="<?= $domicilioData ? $domicilioData['numero'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?= $domicilioData ? $domicilioData['ciudad'] : '' ?>">
              </div>
            </div>

            <div class="second-section-profile">
              <div class="input-text mb-3">
                <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais" value="<?= $domicilioData ? $domicilioData['pais'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Codigo Postal" value="<?= $domicilioData ? $domicilioData['codigo_postal'] : '' ?>">
              </div>

              <div class="input-text mb-3">
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?= $domicilioData ? $domicilioData['telefono'] : '' ?>">
              </div>
            </div>

            <div class="form-footer-section">
              <button type="submit" class="btn btn-coffee btn-block">Actualizar</button>
            </div>
          </form>

        </div>
      </div>
    </div>
</section>