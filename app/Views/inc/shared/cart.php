<button id="cart-booble" class="btn-coffee btn-cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
    <div class="cart-icon animation-join">
        <i class="far fa-shopping-basket text-white"></i>
        <span class="bg-white text-coffee" id="cart-count">0</span>
    </div>
</button>

<div class="offcanvas offcanvas-end cart-container" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header cart-header">
        <h5 class="cart-title" id="offcanvasRightLabel">Mi Canasta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div id="productos-container" class="offcanvas-body cart-body">
    </div>
    <div class="cart-footer">
        <div class="base-price">
            <div class="price">
                <span class="text-coffee fs-4">Subtotal: </span>
                <span class="text-coffee fs-4">$<span id="base-price"></span></span>
            </div>
            <div class="taxes">
                <span class="text-coffee fs-4">Impuestos: </span>
                <span class="text-coffee fs-4">$<span id="taxes"></span></span>
            </div>
        </div>
        <div class="total-checkout">
            <div class="total-price">
                <span class="text-coffee fs-2">Total:<span id="total-text"></span></span>
                <strong><span class="text-coffee fs-2">$<span id="total-price"></span></span></strong>
            </div>

            <div class="check-out">
                <?php if ($user && !(isset($user['domicilio_id']))) : ?>
                    <button class="btn btn-coffee" id="btn-pay" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <p class="m-0">Ir a Pagar</p>
                    </button>
                <?php else : ?>
                    <button id="btn-pay" type="button" class="btn btn-coffee">
                        <a class="m-0 text-white" href="<?php echo base_url('checkout'); ?>">Ir a Pagar</a>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-2" id="staticBackdropLabel">Agregar Domicilio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Antes de continuar, debes agregar un domicilio de entrega.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cerrar</button>
                <a type="button" class="btn btn-coffee" href="<?php echo base_url('perfil'); ?>">
                    <p class="m-0">Agregar Domicilio</p>
                </a>
            </div>
        </div>
    </div>
</div>