

$(window).scroll(function(){
    if($(window).scrollTop() == $(window).height() > $(document).height() - 150) {
        $('.navbarstk').removeClass('sticky');

    }else{
     $('.navbarstk').addClass('sticky');
 }
});             






$('.containpro').show();
$('.btnpromotion').on('click', function () {
    $('.containpro').show();
    $('.containpost').hide();
    $('.btnpromotion').addClass('active');
    $('.btnpost').removeClass('active');
});
$('.btnpost').on('click', function () {
    $('.containpost').show();
    $('.containpro').hide();
    $('.btnpost').addClass('active');
    $('.btnpromotion').removeClass('active');
});



var swiper = new Swiper(".promotionsl", {
    slidesPerView: "auto",
    centeredSlides: true,
    spaceBetween:20,
    observer: true,
  observeParents: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
  },
  autoplay: {
      delay: 5000,
      disableOnInteraction: false,
  },
});   



var swiper = new Swiper(".postslide", {
   slidesPerView: "auto",
   centeredSlides: true,
   effect: "coverflow",
   grabCursor: true,
   observer: true,
  observeParents: true,
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


 $('.headercommentbox').on('click', function () {
        $('.commentbox').toggleClass('d-block');
        
    });



    var bgSection01 = $('.bgSection01').find('img').attr('src');
   $(".section12").css('background', 'linear-gradient(210deg, #0000009e, #0000009c),url('+ bgSection01 + ')top center');

   var bgSection02 = $('.bgSection02').find('img').attr('src');
   $(".section03").css('background', 'linear-gradient(45deg, #00000052, #00000040),url(' + bgSection02 + ')center center');

   var bgSection03 = $('.bgSection03').find('img').attr('src');
   $(".bg56").css('background', 'linear-gradient(45deg, #00000059, #00000075),url(' + bgSection03 + ')center center');


   var bgSection04 = $('.bgSection04').find('img').attr('src');
   $(".-mobile-application-container").css('background', 'linear-gradient(45deg, black, transparent),url(' + bgSection04 + ')center center');

jarallax(document.querySelectorAll('.jarallax'), {
    speed: .7
});



var wrapperMenu = document.querySelector('.sidebarbtn');
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