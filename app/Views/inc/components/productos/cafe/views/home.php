<section class="coffee-section">
    <div class="coffee-header">
        <img src="<?= base_url("assets/img/product/cafe/catalogo.webp"); ?>" alt="">
    </div>
    <div class="coffee-body">
        <div class="coffee-title">
            <h1>Cafe Grano/Molido</h1>
        </div>
        <div class="shop-container">
            <?php if (!$isMobile) : ?>
                <div class="filter-container">
                    <div class="filter-content">
                        <div class="title-container">
                            <h1>Productos</h1>
                        </div>
                        <div class="order-by">
                            <div class="label">
                                <h3>Ordenar Por</h3>
                            </div>
                            <select>
                                <option selected value="1">Precio mayor</option>
                                <option value="2">Precio menor</option>
                            </select>
                        </div>
                        <div class="products-filter-content">
                            <div class="filter-types">
                                <h3>Café Empacado</h3>
                                <div class="filter-type">
                                    <a>
                                        <p>Liofilizado / Soluble</p>
                                    </a>
                                </div>
                            </div>
                            <div class="filter-types">
                                <h3>Molido / Grano</h3>
                                <div class="filter-type">
                                    <a>
                                        <p>Linea Premium Selection</p>
                                    </a>
                                    <a>
                                        <p>Cafés de Origen</p>
                                    </a>
                                    <a>
                                        <p>Linea Sostenible</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="search-container">
                <form>
                    <input type="text" placeholder="Buscar...">
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
                                <div class="order-by">
                                    <div class="label">
                                        <h3>Ordenar Por</h3>
                                    </div>
                                    <select>
                                        <option selected value="1">Precio mayor</option>
                                        <option value="2">Precio menor</option>
                                    </select>
                                </div>
                                <div class="products-filter-content">
                                    <div class="filter-types">
                                        <h3>Café Empacado</h3>
                                        <div class="filter-type">
                                            <a>
                                                <p>Liofilizado / Soluble</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="filter-types">
                                        <h3>Molido / Grano</h3>
                                        <div class="filter-type">
                                            <a>
                                                <p>Linea Premium Selection</p>
                                            </a>
                                            <a>
                                                <p>Cafés de Origen</p>
                                            </a>
                                            <a>
                                                <p>Linea Sostenible</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
                                <img src="assets/img/product/bg-product.png" alt="">
                            </div>
                            <div class="product-img-container">
                                <img src="<?= base_url($product["image"]); ?>" alt="...">
                            </div>
                        </div>
                        <div class="card-body w-100 card-modal">
                            <?php if (!(isset($user['logged_in']) && $user['logged_in'])) : ?>
                                <div id="modal" class="modal need-login">Inicia sesión para poder agregar productos a la canasta</div>
                            <?php endif; ?>
                            <div class="card-title">
                                <h5 class="text-coffee card-price">$<?= $product["price"]; ?> USD</h5>
                            </div>
                            <div class="card-text">
                                <p class="card-name"><?= $product["name"]; ?></p>
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