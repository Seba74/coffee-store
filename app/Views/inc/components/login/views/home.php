<section class="login-section form-container">
  <?php if (session()->getFlashdata('errorLogin')) : ?>
    <div class="alert alert-danger alert-err"><?= session()->getFlashdata('errorLogin') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('errorEmpty')) : ?>
    <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorEmpty') ?></div>
  <?php endif; ?>
  <div class="login-container">
    <div class="form-title-section text-white">
      <h1>Inicio de Sesión</h1>
    </div>
    <form class="form-content" action="<?= base_url('usuario/login') ?>" method="POST">
      <div class="input-text mb-3">
        <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
      </div>
      <div class="input-text mb-3">
        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
      </div>
      <div class="form-footer-section">
        <button type="submit" class="btn btn-white btn-block">Iniciar Sesión</button>
      </div>
    </form>

    <div class="form-footer-section">
      <a href="<?= base_url("register"); ?>" class="btn text-white btn-link btn-block mt-4">¿No tienes una cuenta? Registrate</a>
    </div>
  </div>
  <!-- <div class="form-footer-section">
    <a href="#" class="btn text-coffee btn-link btn-block"> ¿Olvidaste tu contraseña? </a>
  </div> -->
</section>