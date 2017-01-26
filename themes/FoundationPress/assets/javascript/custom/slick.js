$(document).on('ready', function() {
  $('.responsive').slick({
      dots: false,
      arrows:false,
      infinite: false,
      speed: 800,
      autoplay:true,
      autoplaySpeed:2000,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            arrows:false,
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            autoplay:true,
            autoplaySpeed:2000

          }
        },
        {
          breakpoint: 600,
          settings: {
            arrows:false,
            slidesToShow: 2,
            slidesToScroll: 2,
            autoplay:true,
            autoplaySpeed:2000
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows:false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay:true,
            autoplaySpeed:2000
          }
        }
      ]
    });
});
