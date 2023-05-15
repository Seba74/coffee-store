<!-- NAVBAR -->
<header class="position-relative header-main-container">
  <div class="add-header">

  </div>
  <div class="logo-container position-fixed">
    <a href="<?= base_url(""); ?>" class="img-container animation-top">
      <img src="<?= base_url('assets/img/logo/coffee-logo.png') ?>" alt="">
    </a>
  </div>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a href="<?= base_url(""); ?>" class="logo-header navbar-brand text-coffee fs-1 title-font">
        <img src="<?= base_url('assets/img/logo/coffee-logo.png') ?>" class="hide">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="side-section collapse navbar-collapse animation-right" id="navbarNavDropdown">
        <ul class="items-container navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Productos
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?= base_url("cafe"); ?>">
                  <i class="fa-solid fa-right"></i>
                  Café grano/molido
                </a></li>
              <li><a class="dropdown-item" href="<?= base_url("marca"); ?>">
                  <i class="fa-solid fa-right"></i>
                  Articulos de marca
                </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Sobre Corazón de Café
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?= base_url("quienes-somos"); ?>">
                  <i class="fa-solid fa-right"></i>
                  Quiénes somos
                </a></li>
              <li><a class="dropdown-item" href="<?= base_url("nuestra-historia"); ?>">
                  <i class="fa-solid fa-right"></i>
                  Nuestra Historia</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("trabaja-con-nosotros"); ?>">
              Trabaja con nosotros
            </a>
          </li>
          <?php if ($user && isset($user['role_id']) && $user['role_id'] != 4) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url("panel-control"); ?>">
                Panel de Control
              </a>
            </li>
          <?php endif; ?>
          <?php if ($user && isset($user['logged_in']) && $user['logged_in']) : ?>
            <li class="nav-item dropdown logged-container">
              <a class="nav-link dropdown-toggle profile_content" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-coffee-bean"></i>
                <h4><?= $user['username'] ?></h4>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url("perfil"); ?>">
                    <i class="fa-solid fa-user"></i>
                    Perfil
                  </a></li>
                <li><a class="dropdown-item" href="<?= base_url("logout"); ?>">
                    <i class="fa-solid fa-sign-out"></i>
                    Salir
                  </a></li>
              </ul>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url("login"); ?>">
                <i class="fa-solid fa-user"></i>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>