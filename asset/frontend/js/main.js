if ($(window).scrollTop() > 1) {
	$("nav.navbar").css("background","rgba(255,255,255,0.9)");
	$("nav.navbar").css("box-shadow","0 0px 16px 3px rgba(0,0,0,0.1)");
	$("nav.navbar img").css("max-height","60px");
	$("nav.navbar.nav-2").removeClass("nav-color");
}
$(window).scroll(function(){

if ($(this).scrollTop()) {
	$("nav.navbar").css("background","rgba(255,255,255,0.9)");
	$("nav.navbar").css("box-shadow","0 0px 16px 3px rgba(0,0,0,0.1)");
	$("nav.navbar img").css("max-height","60px");
	$("nav.navbar.nav-2").removeClass("nav-color");
}else{
	$("nav.navbar").css("background","transparent");
	$("nav.navbar").css("box-shadow","none");
	$("nav.navbar img").css("max-height","80px");
	$("nav.navbar.nav-2").addClass("nav-color");	
}

});



$(document).ready(function() {

  // Check for click events on the navbar burger icon
  $(".img-modals").click(function() {

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      $(".modal").toggleClass("is-active");
  	  $(".modal-background").click(function() {
      	$(".modal").removeClass("is-active");
  	  });
  	  $(".modal-close").click(function() {
      	$(".modal").removeClass("is-active");
  	  });	
  });	
  $(".navbar-burger").click(function() {

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      $(".navbar-burger").toggleClass("is-active");
      $(".navbar-menu").toggleClass("is-active");

  });
	if($(window).width() < 1024)
	{
		$(".navbar-dropdown").css("display","none");
		$(".navbar-item.has-dropdown").click(function() {
			$(this).children(".navbar-dropdown").toggleClass("activeed");
  		});
	} else {
		$(".navbar-dropdown").css("display","block");
	}

	$('.slider-home').slick({
		dots: false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		adaptiveHeight: false,
		speed: 650,
		autoplay: true,
		autoplaySpeed: 3000,
    	arrows: false
	});
	$('.slider-testi').slick({
		dots: true,
		autoplay: true,
		autoplaySpeed: 5000,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		adaptiveHeight: false,
		autoplay:true,
		autoplaySpeed: 4000,
    	arrows: false
	});

	$('.slider-minat').slick({
		infinite: false,
		speed: 600,
		slidesToShow: 2,
		variableWidth: true,
		autoplay: true,
		autoplaySpeed: 4000,
		responsive: [
			{
		      breakpoint: 769,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		]
	});
	$(".tabs ul li").on("click", function() {
	    var id = $(this).attr("data-tab");

	    $(".tabs ul li").removeClass("is-active");
	    $(".tab-content").removeClass("current-tab");
	    $(this).addClass("is-active");
	    $("#" + id).addClass("current-tab");
	});
	$(".kurikulum-wrap h3.kurikulum-jenis").click( function(){
		$(this).siblings("div.kurikulum-semester").slideToggle();

	});
	$(".kurikulum-wrap h4.kurikulum-isijenis").click( function(){
		$(this).siblings("div").slideToggle();
	});
	$(".faq-wrap h5").click( function(){
		$(this).siblings("blockquote").slideToggle();
	});
	$( ".ket-dosen a" ).click(function() {
	  $( ".ket-dosen p" ).slideToggle();
	});
});