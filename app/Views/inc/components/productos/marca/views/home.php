<section class="coffee-section">
    <div class="coffee-header">
    <img src="<?= base_url("assets/img/product/marca/catalogo.webp"); ?>" alt="">
    </div>
    <div class="coffee-body">
        <div class="coffee-title">
            <h1>Articulos de Marca</h1>
        </div>
        <div class="shop-container">
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
                            <h3>Articulos Corazón de Café</h3>
                            <div class="filter-type">
                                <a>
                                    <p>Para preparar en casa</p>
                                </a>
                                <a>
                                    <p>Termos</p>
                                </a>
                                <a>
                                    <p>Vasos de Reuso</p>
                                </a>
                                <a>
                                    <p>Ropa</p>
                                </a>
                                <a>
                                    <p>Accesorios</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-container">
                <form>
                    <input type="text" placeholder="Buscar...">
                    <button type="submit">
                        <i class="fal fa-mug-hot"></i>
                    </button>
                </form>
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
                                <a class="add-cart" onclick="addToCart(1)">
                                    <p>Agregar a</p>
                                    <i class="far fa-shopping-basket text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>