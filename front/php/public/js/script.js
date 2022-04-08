var loader = document.getElementById('preloader');
window.addEventListener('load', function(){
  loader.style.display = 'none';
})

window.addEventListener("scroll", function(){
  var header = document.querySelector(".navbar");
  header.classList.toggle("fixed-top", window.scrollY > 0);
})

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

$('.feature-product').slick({
    dots: false,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    speed: 1000,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          dots: true,
          arrows: false,
          centerMode: true,
          centerPadding: '10px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          dots: true,
          arrows: false,
          centerMode: true,
          centerPadding: '10px',
          slidesToShow: 1
        }
      }
    ]
  });

  $('.product-wrap').slick({
    arrows: true,
    dots: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 1000,
  });

  $('.play-slider').slick({
    arrows: true,
    dots: false,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    speed: 1000,
    vertical: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
           // dots: true,
           arrows: true,
           centerMode: true,
           centerPadding: '5px',
           slidesToShow: 3,
           vertical: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          // dots: true,
          arrows: true,
          centerMode: true,
          centerPadding: '5px',
          slidesToShow: 3,
          vertical: false
        }
      }
    ]
  });

  window.addEventListener('scroll', e => {
    var el = document.getElementById('jsScroll');
    if(window.scrollY > 200) {
      el.classList.add('visible');
    } else {
      el.classList.remove('visible');
    }
  });
  
  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }

// *****Magnifying glass*****
// var defaults = {
//   round: true,
//   width: 200, 
//   height: 200, 
//   background: '#FFF',
//   shadow: '0 8px 17px 0 rgba(0, 0, 0, 1)', 
//   border: '6px solid #FFF', 
//   cursor: true,
//   zIndex: 999999,
// }
// // 1x
// $('.example').BUP('example', 0.5);
$( function() {
  $( "#slider-range" ).slider({
    range: true,
    min: 0,
    max: 1000,
    values: [ 75, 300],
    slide: function( event, ui ) {
      $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
    }
  });
  $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
    " - $" + $( "#slider-range" ).slider( "values", 1 ) );
} );



function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  
  if(value <= 1){
    var elements = document.querySelector('.decrease_').style.cursor='not-allowed';
  }
  else    if(value >= 1){
    var elements = document.querySelector('.decrease_').style.cursor='curson';
    value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  }
  document.getElementById('number').value = value;
}





