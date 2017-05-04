$(document).ready(function(){
  $('div[class^="header"]>div.button').on("click",function(){
    $('div[class^="menu"]').toggleClass('menu menu-min');
    $('div[class^="header"]').toggleClass('header header-max');
    $('div[class^="content"]').toggleClass('content content-max');
  });
  $('div.receipt>i[role="button"]').on("click",function(){
    $('body>div[class^="modal"]').toggleClass('modal-hide modal-show');
  });
  $('div.modalReceipt>div.exit').on("click",function(){
    $('body>div[class^="modal"]').toggleClass('modal-hide modal-show');
  });
});
