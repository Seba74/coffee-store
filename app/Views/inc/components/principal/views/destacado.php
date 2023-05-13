<!-- Products section -->
<div class="products-section">
    <div class="products__title-section">
        <h1 class="text-coffee">Productos Destacados</h1>
    </div>
    <div class="products-container">
        <?php foreach ($products as $product) { ?>
            <div class="card product-card">
                <div class="card__img-container">
                    <div class="bg-img">
                        <img src="assets/img/product/bg-product.png" alt="">
                    </div>
                    <div class="product-img-container">
                        <img src="<?= base_url($product["image"]); ?>" alt="...">
                    </div>
                </div>
                <div class="card-body w-100">
                    <div class="card-title">
                        <h5 class="text-coffee">$<?= $product["price"]; ?> USD</h5>
                    </div>
                    <div class="card-text">
                        <p><?= $product["name"]; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="btn-container">
            <button class="btn btn-coffee bg-coffee">
                <a href="<?= base_url("products"); ?>" class="text-white">Ver todos los productos</a>
            </button>
        </div>
    </div>
</div>