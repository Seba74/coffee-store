<section class="section form-container">

  <div class="contact-me">
    <div class="card mb-3 ubi-card animation-join">
      <h2 class="card-header bg-coffee text-white">Telefono de Contacto</h2>
      <div class="card-body">
        <h2 class="card-title"> +54 379-4223-344 </h2>
      </div>
    </div>
    <div class="card mb-3 ubi-card animation-join">
      <h2 class="card-header bg-coffee text-white">Empresa</h2>
      <div class="card-body">
        <h2 class="card-title"> Corazón de Cafe S.R.L </h2>
      </div>
    </div>
    <div class="card mb-3 ubi-card animation-join">
      <h2 class="card-header text-white bg-coffee text-center">Titular</h2>
      <div class="card-body">
        <h2 class="card-title">Sebastian Guevara</h2>
      </div>
    </div>
  </div>

  <div class="ubication-container animation-join">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5544.589414802286!2d-58.83292744090266!3d-27.466976124553014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d24ec0c9%3A0xb92ce3fedb0d7729!2sFacultad%20de%20Ciencias%20Exactas%20y%20Naturales%20y%20Agrimensura!5e0!3m2!1ses!2sar!4v1682183552093!5m2!1ses!2sar" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe class="map-content">
    <div class="form-container">
      <div class="form-title-section">
        <h1 class="text-white">Contactate con Nosotros</h1>
      </div>
      <form class="form-content">
        <?php if (isset($user['logged_in']) && $user['logged_in']) : ?>

          <div class="input-group mb-4">
            <span class="input-group-text fs-3">Nombre</span>
            <input type="text" aria-label="Nombre" class="form-control fs-3" value="<?= $user['name'] ?>">
          </div>
          <div class="input-group mb-4">
            <span class="input-group-text fs-3">Apellido</span>
            <input type="text" aria-label="Apellido" class="form-control fs-3" value="<?= $user['surname'] ?>">
          </div>
          <div class="input-group mb-4">
            <span class="input-group-text fs-3">Email</span>
            <input type="email" class="form-control fs-3" id="exampleFormControlInput1" value="<?= $user['email'] ?>">"
          </div>

        <?php else : ?>
          <div class="input-group mb-4">
            <span class="input-group-text fs-3">Nombre</span>
            <input type="text" aria-label="Nombre" class="form-control fs-3">
          </div>
          <div class="input-group mb-4">
            <span class="input-group-text fs-3">Apellido</span>
            <input type="text" aria-label="Apellido" class="form-control fs-3">
          </div>
          <div class="input-group mb-4">
            <span class="input-group-text fs-3">Email</span>
            <input type="email" class="form-control fs-3" id="exampleFormControlInput1" placeholder="nombre@ejemplo.com">
          </div>
        <?php endif; ?>
        <div class="input-group mb-4 cuentanos-de-ti mb-4">
          <textarea class="form-control fs-3" id="validationTextarea" placeholder="Cómo te podemos ayudar"></textarea>
        </div>
        <div class="ubi-btn-container col-12">
          <button class="btn btn-white" type="submit">Contactanos!</button>
        </div>
      </form>
    </div>
  </div>
</section>