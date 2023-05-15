<section class="profile-section form-container">
  <?php if (session()->getFlashdata('success')) : ?>
    <div id="success-message" class="alert alert-success welcome-message"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('errorEmpty')) : ?>
    <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorEmpty') ?></div>
  <?php endif; ?>
  <form class="form-content" action="<?= base_url('usuario/domicilio') ?>" method="POST">

    <div class="input-text mb-3">
      <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="<?= $domicilioData ? $domicilioData['calle'] : '' ?>">
    </div>

    <div class="input-text mb-3">
      <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero" value="<?= $domicilioData ? $domicilioData['numero'] : '' ?>">
    </div>

    <div class="input-text mb-3">
      <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?= $domicilioData ? $domicilioData['ciudad'] : '' ?>">
    </div>

    <div class="input-text mb-3">
      <input type="text" class="form-control" id="pais" name="pais" placeholder="Pais" value="<?= $domicilioData ? $domicilioData['pais'] : '' ?>">
    </div>

    <div class="input-text mb-3">
      <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Codigo Postal" value="<?= $domicilioData ? $domicilioData['codigo_postal'] : '' ?>">
    </div>

    <div class="input-text mb-3">
      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?= $domicilioData ? $domicilioData['telefono'] : '' ?>">
    </div>

    <div class="form-footer-section">
      <button type="submit" class="btn btn-coffee btn-block">Actualizar</button>
    </div>
  </form>
</section>