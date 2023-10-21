// Swiper slider
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

// Show a messsage when de user is logged in successfully
setTimeout(() => {
  const successMessage = document.getElementById('success-message');
  if (successMessage) {
    successMessage.style.transition = 'all 1s ease-in-out';
    successMessage.style.opacity = '0';
  }
}, 2500);


// CART

// open cart
const btnAbrirModal = document.querySelector('[data-bs-target="#offcanvasRight"]');
const cartCountElement = document.getElementById('cart-count');

// It can't be possible add productos to cart if user is not logged in
if (!btnAbrirModal) {
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
}


// Add products to cart

let cart = [];

function addToCart(button) {
  const product = JSON.parse(button.getAttribute('data-array'));
  cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];

  const productInCart = cart.find((item) => item.product.id === product.id);

  if (!productInCart) {
    cart.push({
      product,
      quantity: 1,
      total: product.precio * 1.21,
    });
  } else {
    cart.map((item) => {
      if (item.product.id === product.id) {
        item.quantity++;
        item.total = item.product.precio * item.quantity * 1.21;
      }
    });
  }
  localStorage.setItem('cart', JSON.stringify(cart));
  showCart();
  btnAbrirModal.click();
}

// Total, Subtotal and Taxes
const totalPriceElement = document.getElementById('total-price');
const subtotalElement = document.getElementById('base-price');
const productosContainer = document.getElementById('productos-container');
const taxes = document.getElementById('taxes');

// Get products from local storage and show them in the cart
if (productosContainer) {
  function showCart() {
    cart = JSON.parse(localStorage.getItem('cart'));
    cart = cart ? cart : [];
    let totalProductos = 0;
    if (cart) {
      totalProductos = cart.reduce((total, item) => total + item.quantity, 0);
    }
    if (totalProductos > 0) {
      cartCountElement.textContent = totalProductos;
    } else {
      cartCountElement.textContent = 0;
    }
    let subtotal = 0;
    let totalPrice = 0;

    const btnPay = document.getElementById('btn-pay');
    if (cart.length === 0) {
      productosContainer.innerHTML = '<h2 class="text-center">No hay productos en la canasta</h2>';
      subtotalElement.textContent = '0';
      taxes.textContent = '0';
      totalPriceElement.textContent = '0';

      btnPay.disabled = true;
      return;
    }
    btnPay.disabled = false;
    productosContainer.innerHTML = '';

    cart.forEach((item) => {
      subtotal += item.product.precio * item.quantity;
      totalPrice = subtotal * 1.21;

      item.product.precio = parseFloat(item.product.precio);

      const cartCard = document.createElement('div');
      const cartContent = document.createElement('div');
      cartContent.classList.add('cart-content');
      cartCard.classList.add('cart-card');
      cartContent.appendChild(cartCard);

      const imgContainer = document.createElement('div');
      imgContainer.classList.add('cart-card__img-container');
      const imgElemento = document.createElement('img');
      imgElemento.src = item.product.imagePath;
      imgElemento.alt = "";
      imgContainer.appendChild(imgElemento);
      cartCard.appendChild(imgContainer);

      const cardContent = document.createElement('div');
      cardContent.classList.add('cart-card__content');

      const cardInfo = document.createElement('div');
      cardInfo.classList.add('card-info');

      const cardTitle = document.createElement('h2');
      cardTitle.classList.add('card-title');
      cardTitle.textContent = item.product.nombre;
      cardInfo.appendChild(cardTitle);

      const cardPrice = document.createElement('p');
      cardPrice.classList.add('card-price');
      cardPrice.textContent = `$${item.product.precio} ARS`;
      cardInfo.appendChild(cardPrice);

      cardContent.appendChild(cardInfo);

      const cardActions = document.createElement('div');
      cardActions.classList.add('card-actions');

      const btnMinus = document.createElement('button');
      btnMinus.classList.add('btn', 'btn-coffee', 'btn-qty');
      btnMinus.type = 'button';
      btnMinus.innerHTML = '<i class="fas fa-minus"></i>';
      cardActions.appendChild(btnMinus);

      const cardActionsCant = document.createElement('div');
      cardActionsCant.classList.add('card-actions__cant');
      const spanCant = document.createElement('span');
      spanCant.textContent = item.quantity;
      cardActionsCant.appendChild(spanCant);
      cardActions.appendChild(cardActionsCant);

      const btnPlus = document.createElement('button');
      btnPlus.classList.add('btn', 'btn-coffee', 'btn-qty');
      btnPlus.type = 'button';
      btnPlus.innerHTML = '<i class="fas fa-plus"></i>';
      cardActions.appendChild(btnPlus);

      cardContent.appendChild(cardActions);

      cartCard.appendChild(cardContent);

      productosContainer.appendChild(cartContent);

      // add another product to cart

      btnMinus.addEventListener('click', () => {
        if (item.quantity > 1) {

          spanCant.textContent--;
          subtotal -= item.product.precio;
          subtotalElement.textContent = `${subtotal.toFixed(2)}`;
          let taxesProducts = subtotal * 0.21;
          taxes.textContent = `${taxesProducts.toFixed(2)}`;
          totalPrice = subtotal + taxesProducts;
          totalPriceElement.textContent = `${totalPrice.toFixed(2)}`;
          item.quantity--;
          localStorage.setItem('cart', JSON.stringify(cart));
          showCart();
        } else {
          const newCart = cart.filter((cartItem) => cartItem.product.id !== item.product.id);
          localStorage.setItem('cart', JSON.stringify(newCart));
          showCart();
        }
      });

      btnPlus.addEventListener('click', () => {
        item.quantity++;
        localStorage.setItem('cart', JSON.stringify(cart));
        showCart();
      });

      btnPay.addEventListener('click', () => {
        localStorage.setItem('cart', JSON.stringify(cart));
      });

    })

    subtotalElement.textContent = `${subtotal.toFixed(2)}`;
    let taxesProducts = subtotal * 0.21;
    taxes.textContent = `${taxesProducts.toFixed(2)}`;

    totalPrice = subtotal + taxesProducts;
    totalPriceElement.textContent = `${totalPrice.toFixed(2)}`;
  }

  // load cart
  window.addEventListener('load', showCart);

  // Log out -> remove local Storage

  const btnLogOut = document.getElementById('logout');
  if (btnLogOut) {
    btnLogOut.addEventListener('click', function () {
      localStorage.removeItem('cart');
    });
  }
  window.addEventListener('scroll', function () {
    let scrollVertical = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

    const cartBooble = document.getElementById('cart-booble');
    if (scrollVertical > 100) {
      cartBooble.style.transition = `transform 0.5s ease-in-out`;
      cartBooble.style.transform = `translateY(-100px)`;
      // transition
    } else {
      cartBooble.style.transition = `transform 0.5s ease-in-out`;
      cartBooble.style.transform = `translateY(0)`;
    }

  });
}


// Confirmar pedido

const cartItemsBody = document.getElementById('cart-items-body');
cart = JSON.parse(localStorage.getItem('cart'));
totalBeforeIVA = 0;
totalIVA = 0;

if (cartItemsBody && cart) {
  cart.forEach(item => {
    const { product, quantity } = item;
    totalBeforeIVA += product.precio * quantity;
    const row = document.createElement('tr');

    const nameCell = document.createElement('td');
    nameCell.textContent = product.nombre;
    row.appendChild(nameCell);

    const quantityCell = document.createElement('td');
    quantityCell.textContent = quantity;
    row.appendChild(quantityCell);

    const priceCell = document.createElement('td');
    const unityPrice = product.precio;
    priceCell.textContent = `$${unityPrice.toFixed(2)}`;
    row.appendChild(priceCell);

    const priceTotal = document.createElement('td');
    priceTotal.textContent = `$${(product.precio * quantity).toFixed(2)}`
    row.appendChild(priceTotal);

    cartItemsBody.appendChild(row);

  });

  const cartSubtotal = document.getElementById('cart-subtotal');
  cartSubtotal.textContent = `$${totalBeforeIVA.toFixed(2)}`;

  const cartIVA = document.getElementById('cart-iva');
  totalIVA = totalBeforeIVA * 0.21;
  cartIVA.textContent = `$${totalIVA.toFixed(2)}`;

  const cartTotal = document.getElementById('cart-total');
  cartTotal.textContent = `$${(totalBeforeIVA + totalIVA).toFixed(2)}`;

}

const btnConfirmarPedido = document.getElementById('btn-confirmar-pedido');
cart = JSON.parse(localStorage.getItem('cart'));
if (btnConfirmarPedido) {
  btnConfirmarPedido.addEventListener('click', function () {
    $.ajax({
      url: '/proyecto-guevara-johan/public/cart/save-cart',
      type: 'POST',
      data: JSON.stringify(cart),
      contentType: 'application/json',
      success: function (response) {
        localStorage.removeItem('cart');
        window.location.href = '/proyecto-guevara-johan/public/perfil';
      },
      error: function (error) {
        console.error(error);
      }
    });
  });
}