<footer class="footer-container">
    <div class="footer-header">
        <div class="line"></div>
        <div class="redes">
            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f text-white fs-1"></i></a>
            <a href="https://www.instagram.com/"><i class="fab fa-instagram text-white fs-1"></i></a>
            <a href="https://www.twitter.com/"><i class="fab fa-twitter text-white fs-1"></i></a>
            <a href="https://www.youtube.com/"><i class="fab fa-youtube text-white fs-1"></i></a>
            <a href="https://www.tiktok.com/"><i class="fab fa-tiktok text-white fs-1"></i></a>
        </div>
        <div class="line"></div>
    </div>
    <div class="footer-copyright">
        <div class="footer-logo">
            <img src="<?= base_url('assets/img/logo/coffee-logo.png') ?>" alt="Logo">
        </div>
        <p class="text-center fs-5">© <?= date('Y') ?> - All Rights Reserved</p>
    </div>
    <div class="footer-body">
        <div class="body-content">
            <h1 class="fs-2">Ayuda</h1>
            <ul class="p-0 text-center">
                <li><a href="<?= base_url("contactanos"); ?>" class="text-white">Contactanos</a></li>
                <li><a href="<?= base_url("comercializacion"); ?>" class="text-white">Comercialización</a></li>
                <li><a href="<?= base_url("politicas-privacidad"); ?>" class="text-white">Políticas de Privacidad</a></li>
                <li><a href="<?= base_url("terminos-condiciones"); ?>" class="text-white">Terminos y Condiciones</a></li>
            </ul>
        </div>
        <div class="body-content">
            <h1 class="fs-2">Sobre Corazón de Café</h1>
            <ul class="p-0 text-center">
                <li><a href="<?= base_url("productos"); ?>">Productos</a></li>
                <li><a href="<?= base_url("quienes-somos"); ?>">Quienes Somos</a></li>
                <li><a href="<?= base_url("nuestra-historia"); ?>">Nuestra Historia</a></li>
                <li><a href="<?= base_url("trabaja-con-nosotros"); ?>">Trabaja con Nosotros</a></li>
            </ul>
        </div>
    </div>
</footer>