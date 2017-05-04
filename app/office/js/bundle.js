$(document).ready(function(){
  $('div[class^="header"]>div.button').on("click",function(){
    $('div[class^="menu"]').toggleClass('menu menu-min');
    $('div[class^="header"]').toggleClass('header header-max');
    $('div[class^="content"]').toggleClass('content content-max');
  });
  $('div.categoria>div.offers').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
  });
  $('div.productContainer').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1572,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 1254,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 936,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
  $('div.receipt>i[role="button"]').on("click",function(){
    $('body>div[class^="modal"]').toggleClass('modal-hide modal-show');
  });
  $('div.modalReceipt>div.exit').on("click",function(){
    $('body>div[class^="modal"]').toggleClass('modal-hide modal-show');
  });
});
