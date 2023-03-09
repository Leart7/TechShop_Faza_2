<?php include 'header.php' ?>





  <link rel="stylesheet" href="slider.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

<body>
  <div class="main-section">
    
    <div class="main-text">
    <img src="images/Apple-Logo.png" id="apple" alt="">
      <h1>Official Apple Reseller</h1>
      <h3>Find the newest apple products in our shop</h3>
      <button id="learnmore">Explore</button>
    </div>
    

  </div>
  <div class="containerslider">
    <div class="swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide"><img src="images/banner1.jpg"></div>
        <div class="swiper-slide"><img src="images/banner2.jpg"></div>
        <div class="swiper-slide"><img src="images/banner3.jpg"></div>
        <div class="swiper-slide"><img src="images/banner4.jpg"></div>
        
        ...
      </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>
    
      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper('.swiper', {
      autoplay:{
        delay: 5000,
        disableOnInteraction: false,
      },
  loop: true,

  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});
  </script>

  <div class="threecontainer">
    <div class="threecontainerrow">
      <div class="vertaligned">
      <div class="imgcontainer">
      <img src="images/delivery.png" id="deliverytruck" alt="">
      </div>
      <div class="textcontainer">
      <h3>FREE SHIPPING</h3><br>
      <p>Free Shipping in Kosovo for orders over 10$</p>
      </div>
      </div>
    
    </div>
    <div class="threecontainerrow">
      <div class="vertaligned">
        <div class="imgcontainer">
        <img src="images/PngItem_2797797.png" id="paymentmethod" alt="">
        </div>
        <div class="textcontainer">
        <h3>100% Payment Secure</h3>
        <p>Pay with credit card or by cash</p>
        </div>
      </div>
    </div>

    <div class="threecontainerrow">
      <div class="vertaligned">
      <div class="imgcontainer">
      <img src="images/return.png" id="returnicon" alt="">
      </div>
      <div class="textcontainer">
      <h3>7 Days Return</h3>
      <p>Simply return it within 7 days for an exchange</p>
      </div>
      </div>
     
    </div>
  </div>


