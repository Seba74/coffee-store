<section class="login-section form-container">
  <?php if (session()->getFlashdata('errorCompra')) : ?>
    <div class="alert alert-danger alert-er"><?= session()->getFlashdata('errorCompra') ?></div>
  <?php endif; ?>
  <div class="bg-top"></div>
  <div class="checkout-container">
    <div class="form-title-section text-coffee">
      <h1>Confirmar Pedido</h1>
    </div>
    <div class="checkout-content accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="buttton-text-acc accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Mi Canasta
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <form class="form-content" action="<?= base_url('usuario/login') ?>" method="POST" id="cart-items">
              <table id="cart-table" class="table table-striped table-spacing table-content table-checkout mb-0">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio/Unidad</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody id="cart-items-body"></tbody>
              </table>

            </form>

            <div class="amount-container">
              <div class="subtotal">
                <div colspan="2">Subtotal sin IVA</div>
                <div class="value" id="cart-subtotal"></div>
              </div>
              <div class="total-iva">
                <div colspan="2">IVA 21%</div>
                <div class="value" id="cart-iva"></div>
              </div>
              <div class="total">
                <div colspan="2">Total</div>
                <div class="value" id="cart-total"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="buttton-text-acc accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Identificación
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <form class="form-content" action="<?= base_url('usuario/login') ?>" method="POST" id="cart-items">
              <table id="cart-table" class="table table-striped table-spacing table-content table-checkout mb-0">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio/Unidad</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody id="cart-items-body"></tbody>
              </table>

            </form>

            <div class="amount-container">
              <div class="subtotal">
                <div colspan="2">Subtotal sin IVA</div>
                <div class="value" id="cart-subtotal"></div>
              </div>
              <div class="total-iva">
                <div colspan="2">IVA 21%</div>
                <div class="value" id="cart-iva"></div>
              </div>
              <div class="total">
                <div colspan="2">Total</div>
                <div class="value" id="cart-total"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="buttton-text-acc accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            Metodo de Pago
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <form class="form-content" action="<?= base_url('usuario/login') ?>" method="POST" id="cart-items">
              <table id="cart-table" class="table table-striped table-spacing table-content table-checkout mb-0">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio/Unidad</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody id="cart-items-body"></tbody>
              </table>

            </form>

            <div class="amount-container">
              <div class="subtotal">
                <div colspan="2">Subtotal sin IVA</div>
                <div class="value" id="cart-subtotal"></div>
              </div>
              <div class="total-iva">
                <div colspan="2">IVA 21%</div>
                <div class="value" id="cart-iva"></div>
              </div>
              <div class="total">
                <div colspan="2">Total</div>
                <div class="value" id="cart-total"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFour">
          <button class="buttton-text-acc accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
            Metodo de Envío
          </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <form class="form-content" action="<?= base_url('usuario/login') ?>" method="POST" id="cart-items">
              <table id="cart-table" class="table table-striped table-spacing table-content table-checkout mb-0">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio/Unidad</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody id="cart-items-body"></tbody>
              </table>
            </form>

            <div class="amount-container">
              <div class="subtotal">
                <div colspan="2">Subtotal sin IVA</div>
                <div class="value" id="cart-subtotal"></div>
              </div>
              <div class="total-iva">
                <div colspan="2">IVA 21%</div>
                <div class="value" id="cart-iva"></div>
              </div>
              <div class="total">
                <div colspan="2">Total</div>
                <div class="value" id="cart-total"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-footer-section mt-5">
      <a class="btn btn-coffee btn-block mt-4" id="btn-confirmar-pedido">Confirmar Pedido</a>
    </div>

    <div class="form-footer-section form-footer-cancel">
      <a href="<?= base_url("/"); ?>" class="btn text-coffee btn-link btn-block my-4">Cancelar Pedido</a>
    </div>
  </div>
  <div class="bg-bottom"></div>
</section>