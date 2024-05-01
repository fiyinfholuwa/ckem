const testimonyswiper = new Swiper('.testimony-swiper', {
    // Optional parameters
    speed: 1000,
    spaceBetween: 10,
  
    // direction: 'horizontal',
    loop: true,
  
    autoplay: {
        delay: 3000,
      },
      centeredSlides: true,
      centeredSlidesBounds:true,

      effect: 'coverflow',
      coverflowEffect: {
        rotate: 30,
        slideShadows: false,
      },
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
  });