
(function(){


  var slider = tns({
    container: '#colecciones-slider',
    controlsContainer: "#slide-controls",
    items: 3,
    slideBy: 'page',
    autoplay: true,
    autoplayButtonOutput: false,
    nav: false,
    responsive: {
      50: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 3
      }
    }
  });

  var slider2 = tns({
    container: '#noticias-slider',
    controlsContainer: "#slide-noticia-controls",
    items: 3,
    slideBy: 'page',
    autoplay: true,
    autoplayButtonOutput: false,
    nav: false,
    responsive: {
      50: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 3
      }
    }
  });


  console.log('init');
})();
