<section class="section form-container">

  <div class="form-title-section">
    <h1>Formulario de Inscripción</h1>
  </div>

  <form class="was-validated form-content">
    <div class="input-group mb-4">
      <span class="input-group-text fs-2">Nombre</span>
      <input type="text" aria-label="Nombre" class="form-control is-invalid fs-3" required>
    </div>
    <div class="input-group mb-4">
      <span class="input-group-text fs-2">Apellido</span>
      <input type="text" aria-label="Apellido" class="form-control is-invalid fs-3" required>
    </div>
    <div class="input-group mb-4">
      <span class="input-group-text fs-2">Email</span>
      <input type="email" class="form-control is-invalid fs-3" id="exampleFormControlInput1"
        placeholder="name@example.com" required>
    </div>
    <div class="file-container mb-4">
      <input class="form-control is-invalid fs-3" type="file" id="formFile" required>
    </div>
    <div class="input-group mb-4 cuentanos-de-ti mb-4">
      <textarea class="form-control fs-3" id="validationTextarea" placeholder="Cuentanos de Ti" required></textarea>
    </div>
    <div class="col-12">
      <button class="btn btn-coffee" type="submit">Enviar formulario</button>
    </div>
  </form>
</section>