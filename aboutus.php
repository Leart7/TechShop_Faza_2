<?php include 'header.php' ?>





  <link rel="stylesheet" href="slider.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

<body>
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


