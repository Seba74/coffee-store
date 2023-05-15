const swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 0,
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
  },
});

let cartCount = 0;

function addToCart(button) {
  const product = JSON.parse(button.getAttribute('data-array'));
  console.log(product);
  if (localStorage.getItem('cart') === null) {
    const cart = [];
    cart.push(product);
    localStorage.setItem('cart', JSON.stringify(cart));
  } else {
    const cart = JSON.parse(localStorage.getItem('cart'));
    cart.push(product);
    localStorage.setItem('cart', JSON.stringify(cart));
  }
}

setTimeout(() => {
  const successMessage = document.getElementById('success-message');
  if (successMessage) {
    successMessage.style.transition = 'all 1s ease-in-out';
    successMessage.style.opacity = '0';
  }
}, 2500);


const modals = document.getElementsByClassName('modal');
const cards = document.getElementsByClassName('card-modal');

if (modals.length > 0 && cards.length > 0) {
  for (let i = 0; i < cards.length; i++) {
    cards[i].addEventListener('mouseover', () => {
      modals[i].style.display = 'flex';
    });

    // mouseout
    cards[i].addEventListener('mouseout', () => {
      modals[i].style.display = 'none';
    });
  }
}

