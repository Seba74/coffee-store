<section class="login-section form-container">
  <?php if (session()->getFlashdata('errorEmpty')) : ?>
    <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorEmpty') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('errorUser')) : ?>
    <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorUser') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('errorEmail')) : ?>
    <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorEmail') ?></div>
  <?php endif; ?>
  <div class="login-container">
    <div class="form-title-section text-white">
      <h1>Crear Cuenta</h1>
    </div>
    <form class="form-content" action="<?= base_url('usuario/register') ?>" method="POST">
      <div class="input-text mb-3">
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
      </div>
      <div class="input-text mb-3">
        <input type="text" class="form-control" id="surname" name="surname" placeholder="Apellido">
      </div>
      <div class="input-text mb-3">
        <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de Usuario">
      </div>
      <div class="input-text mb-3">
        <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
      </div>
      <div class="input-text mb-3">
        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
      </div>
      <div class="form-footer-section">
        <button type="submit" class="btn btn-white btn-block">Registrarse</button>
      </div>
    </form>

    <div class="form-footer-section">
      <a href="<?= base_url("login"); ?>" class="btn text-white btn-link btn-block mt-4"> ¿Ya tienes una cuenta? </a>
    </div>
  </div>
  <!-- <div class="form-footer-section">
    <a href="#" class="btn text-coffee btn-link btn-block"> ¿Olvidaste tu contraseña? </a>
  </div> -->
</section>