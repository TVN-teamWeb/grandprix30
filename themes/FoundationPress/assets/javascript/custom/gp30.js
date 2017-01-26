/* MENU */

$("#menu-main .menu-item").hover(function() {

  $("#menu-main > .menu-item > a").addClass('sfocato');
  $(this).find("a").removeClass('sfocato');
  $("menu-main").css("z-index", "50");

  /* visualizzazione submenu */
  $(".is-active > .is-dropdown-submenu").css("opacity", 1);
  //$(this).removeClass('sfocato');
});

$("#menu-main > .menu-item").mouseout(function() {
  $("#menu-main > .menu-item > a").removeClass('sfocato');
  //$(".submenu").css("top", "5px");
});

$("#menu-main").find(".menu-item").click(function() {
  $("#menu-main").find(".active").removeClass('active');
  $(this).addClass("active");
  var sect_id = $(this).find("a").eq(0).attr("href");
  if(sect_id != "#") {
    console.log(sect_id);
    goto_section($(sect_id));
  }
});



$(window).scroll(function() {

  /* animazione top menu */
  if($(this).scrollTop()>50){
      $(".is-stuck").removeClass("bigger");
      $(".is-stuck").addClass("smaller");
      $("#backtotop").css("opacity"," 1");
  } else {
    $(".is-stuck").removeClass("smaller");
    $(".is-stuck").addClass("bigger");
    $("#backtotop").css("opacity", "0");
  }

  /* fade in sezioni */
  var ST = new Number($("#backtotop").offset().top);
  var idx = 0;
  $(".container section").each( function() {
    var sect_ST = parseInt($(".container section").eq(idx).offset().top);
    var IDS = $(this).attr("id");
    if(IDS != "slider") {
      if(ST>sect_ST) {
        console.log("fade in "+$(this).attr("id"));
        //console.log("Page "+ST+" section "+sect_ST);
        $(this).css("opacity",1);
      }
    }
    idx++;
   });

  });

  function goto_section(sect) {

    $('html, body').animate({
      scrollTop: sect.offset().top + 60
    },2000);
  }

  function goto_top() {

    $('html, body').animate({
      scrollTop: 0
    },1500);
  }

  /* SLIDER */

  $(document).ready( function() {

    $(".claim img").animate({
      opacity: 1
    },200);
    var $animation = $(".claim img").data("animation");

    MotionUI.animateIn($(".claim img"), "slide-in-right");

    $(".submenu").removeClass("vertical");
    //$(".submenu").css("top", "5px");

   });

   /* BACK TO TOP */
   $("#backtotop a").click( function() {
     //console.log("back to top");
     goto_top();
   });


/*Roll-hover immagini*/

$(document).ready(function() {
  $('.thumb-video').hover(
    function(){

      $(this).find('.caption').fadeIn(350);
    },
    function(){
      $(this).find('.caption').fadeOut(200);
    }
  );
});