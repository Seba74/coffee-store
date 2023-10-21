<section class="coffee-section">
    <div class="coffee-header">
        <img src="<?= base_url("assets/img/productos/cafe/catalogo.webp"); ?>" alt="">
    </div>
    <div class="coffee-body">
        <div class="coffee-title">
            <h1>Cafe Grano/Molido</h1>
        </div>
        <div class="shop-container">
            <?php if (!$isMobile) : ?>
                <div class="filter-container">
                    <div class="filter-content">
                        <form id="filter-form" action="<?= base_url("producto/filtrar/2"); ?>" method="POST">
                            <div class="filter-content">
                                <div class="title-container">
                                    <h1>Filtros</h1>
                                </div>
                                <div class="order-by">
                                    <div class="label">
                                        <h3>Ordenar Por</h3>
                                    </div>
                                    <select name="orderBy">
                                        <option value="1" <?= $filters['orderBy'] == 1 ? 'selected' : '' ?>>Precio menor</option>
                                        <option value="2" <?= $filters['orderBy'] == 2 ? 'selected' : '' ?>>Precio mayor</option>
                                    </select>
                                </div>
                                <div class="order-by">
                                    <div class="label">
                                        <h3>Tipo de Café</h3>
                                    </div>
                                    <select name="tipo">
                                        <option value="0" <?= $filters['tipoCafe'] == 0 ? 'selected' : '' ?>>Todos</option>
                                        <option value="1" <?= $filters['tipoCafe'] == 1 ? 'selected' : '' ?>>Línea Premium</option>
                                        <option value="2" <?= $filters['tipoCafe'] == 2 ? 'selected' : '' ?>>Línea Origen</option>
                                        <option value="3" <?= $filters['tipoCafe'] == 3 ? 'selected' : '' ?>>Línea Sostenible</option>
                                    </select>
                                </div>
                                <div class="order-by">
                                    <div class="label">
                                        <h3>Categoría</h3>
                                    </div>
                                    <select name="categoria">
                                        <option value="0" <?= $filters['categoria'] == 0 ? 'selected' : '' ?>>Todos</option>
                                        <option value="1" <?= $filters['categoria'] == 1 ? 'selected' : '' ?>>Café en Grano</option>
                                        <option value="2" <?= $filters['categoria'] == 2 ? 'selected' : '' ?>>Café Molido</option>
                                        <option value="3" <?= $filters['categoria'] == 3 ? 'selected' : '' ?>>Café Soluble</option>
                                    </select>
                                </div>
                                <div class="form-footer-section">
                                    <button type="submit" class="btn btn-coffee btn-block">Aplicar Filtros</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <div class="search-container">
                <form action="<?= base_url("producto/filtrar/2"); ?>" method="POST">
                    <input type="text" placeholder="Buscar..." value="<?= $filters['text'] ?>" name="text">
                    <button type="submit">
                        <i class="fal fa-mug-hot"></i>
                    </button>
                </form>
            </div>
            <?php if ($isMobile) : ?>
                <li class="nav-item dropdown filter-products">
                    <a class="nav-link dropdown-toggle filter-products__content" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <h1>FILTROS</h1>
                    </a>
                    <ul class="dropdown-menu">
                        <div class="filter-container">
                            <div class="filter-content">
                                <form id="filter-form" action="<?= base_url("producto/filtrar"); ?>" method="POST">
                                    <div class="filter-content">
                                        <div class="title-container">
                                            <h1>Filtros</h1>
                                        </div>
                                        <div class="order-by">
                                            <div class="label">
                                                <h3>Ordenar Por</h3>
                                            </div>
                                            <select name="orderBy">
                                                <option value="1" <?= $filters['orderBy'] == 1 ? 'selected' : '' ?>>Precio menor</option>
                                                <option value="2" <?= $filters['orderBy'] == 2 ? 'selected' : '' ?>>Precio mayor</option>
                                            </select>
                                        </div>
                                        <div class="order-by">
                                            <div class="label">
                                                <h3>Tipo de Café</h3>
                                            </div>
                                            <select name="tipo">
                                                <option value="0" <?= $filters['tipoCafe'] == 0 ? 'selected' : '' ?>>Todos</option>
                                                <option value="1" <?= $filters['tipoCafe'] == 1 ? 'selected' : '' ?>>Línea Premium</option>
                                                <option value="2" <?= $filters['tipoCafe'] == 2 ? 'selected' : '' ?>>Línea Origen</option>
                                                <option value="3" <?= $filters['tipoCafe'] == 3 ? 'selected' : '' ?>>Línea Sostenible</option>
                                            </select>
                                        </div>
                                        <div class="order-by">
                                            <div class="label">
                                                <h3>Categoría</h3>
                                            </div>
                                            <select name="categoria">
                                                <option value="0" <?= $filters['categoria'] == 0 ? 'selected' : '' ?>>Todos</option>
                                                <option value="1" <?= $filters['categoria'] == 1 ? 'selected' : '' ?>>Café en Grano</option>
                                                <option value="2" <?= $filters['categoria'] == 2 ? 'selected' : '' ?>>Café Molido</option>
                                                <option value="3" <?= $filters['categoria'] == 3 ? 'selected' : '' ?>>Café Soluble</option>
                                            </select>
                                        </div>
                                        <div class="form-footer-section">
                                            <button type="submit" class="btn btn-coffee btn-block">Aplicar Filtros</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </ul>
                </li>
            <?php endif; ?>
            <div class="products-container">
                <?php foreach ($products as $product) { ?>
                    <div class="card product-card">
                        <div class="card__img-container">
                            <div class="bg-img">
                                <img src="assets/img/productos/bg-product.png" alt="">
                            </div>
                            <div class="product-img-container">
                                <img src="<?= $product["imagePath"]; ?>" alt="<?= ($product["nombre"]); ?>">
                            </div>
                        </div>
                        <div class="card-body w-100 card-modal">
                            <?php if (!(isset($user['logged_in']) && $user['logged_in'])) : ?>
                                <div id="modal" class="modal need-login">Inicia sesión para poder agregar productos a la canasta</div>
                            <?php endif; ?>
                            <div class="card-title">
                                <h5 class="text-coffee card-price">$<?= $product["precio"]; ?> ARS</h5>
                            </div>
                            <div class="card-text">
                                <p class="card-name"><?= $product["nombre"]; ?></p>
                                <?php if (isset($user['logged_in']) && $user['logged_in']) : ?>
                                    <button type="button" class="add-cart" data-array="<?php echo htmlentities(json_encode($product)); ?>" onclick='addToCart(this)'>
                                        <p>Agregar a</p>
                                        <i class="far fa-shopping-basket text-white"></i>
                                    </button>
                                <?php else : ?>
                                    <button disabled class="add-cart disabled-btn">
                                        <p>Agregar a</p>
                                        <i class="far fa-shopping-basket"></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>