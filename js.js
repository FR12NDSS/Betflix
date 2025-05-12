   var bgSection01 = $('.bgSection01').find('img').attr('src');
   $(".section01").css('background', 'linear-gradient(45deg, #000000c7, #7e0b0b4f),url('+ bgSection01 + ')center center');

   var BGTab02 = $('.BGTab02').find('img').attr('src');
   $(".tapservice").css('background', 'linear-gradient(140deg, rgb(0 0 0 / 55%) 0%, rgb(0 0 0 / 42%) 100%), url(' + BGTab02 + ') center center');


   var bgSection03 = $('.bgSection03').find('img').attr('src');
   $(".section03").css('background', 'linear-gradient(58deg, #000000b0, transparent),url(' + bgSection03 + ')center top');



   var bgSection04 = $('.bgSection04').find('img').attr('src');
   $(".section04").css('background', 'url(' + bgSection04 + ')bottom center');

   var bgSection05 = $('.bgSection05').find('img').attr('src');
   $(".section05").css('background', 'linear-gradient(63deg, black, transparent),url(' + bgSection05 + ')bottom center');

   var bgBody = $('.bgBody').find('img').attr('src');
   $(".fixedbgback").css('background', 'radial-gradient(#9203035e, #000000ba),url(' + bgBody + ') center center');




jarallax(document.querySelectorAll('.jarallax'), {
    speed: .7
});





if (!$('#wpadminbar')) {
    $('.comment-respond').hide();
}

 $("a").attr('rel', "nofollow noreferrer");

 $('.headercommentbox').on('click', function () {
        $('.commentbox').toggleClass('d-block');
        
    });

 $('.hideline').on('click', function () {
        $('.fxline').hide();
        
    });


var swiper = new Swiper(".postslide", {
   slidesPerView: "auto",
   centeredSlides: true,
   effect: "coverflow",
   grabCursor: true,
   coverflowEffect: {
      rotate: 20,
      stretch: 0,
      depth: 200,
      modifier: 1,
      slideShadows: true,
  },
  pagination: {
    el: ".swiper-pagination2",
      clickable: true,
  },
  autoplay: {
      delay: 5500,
      disableOnInteraction: false,
  },
});



var swiper = new Swiper(".promotionsl", {
    slidesPerView: "auto",
    centeredSlides: true,
    spaceBetween:20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
  },
  autoplay: {
      delay: 5000,
      disableOnInteraction: false,
  },
});






var wrapperMenu = document.querySelector('.wrapper-menu');
wrapperMenu.addEventListener('click', function(){
  wrapperMenu.classList.toggle('open'); 
  wrapperMenu.classList.toggle('hamopen');
})
$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });
    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
        wrapperMenu.classList.toggle('open'); 
        wrapperMenu.classList.toggle('hamopen');
    });
    $('.sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('.overlay').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});