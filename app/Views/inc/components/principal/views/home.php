<div class="home-view-container d-flex flex-column align-items-center mt-2 mb-2 animation-join">
  <?php if (session()->getFlashdata('success')) : ?>
    <div id="success-message" class="alert alert-success welcome-message"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <div class="swiper mySwiper animation-join">
    <div class="swiper-wrapper w-100 h-100">
      <?php foreach ($carousel as $img) { ?>
        <div class="swiper-slide text-center d-flex justify-content-center align-items-center">
          <img src="<?= base_url($img); ?>">
        </div>
      <?php } ?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next text-white"></div>
    <div class="swiper-button-prev text-white"></div>
  </div>
  <div class="add-section">
    <div class="add-card d-flex w-100">
      <div class="img-container">
        <img src="assets/img/adds/add-1.webp">
      </div>
      <div class="img-container">
        <img src="assets/img/adds/add-2.webp">
      </div>
    </div>
  </div>
</div>