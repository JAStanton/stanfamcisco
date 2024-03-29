jQuery(document).ready(function($){ // START


  // Input title
  $('input[title], textarea[title]').each(function() {if($(this).val() === '') {$(this).val($(this).attr('title'));}
    $(this).focus(function() {if($(this).val() == $(this).attr('title')) {$(this).val('').addClass('focused');}});
    $(this).blur(function() {if($(this).val() === '') {$(this).val($(this).attr('title')).removeClass('focused');}});
  });


  // Fade in and out
  $('.fade').hover(
    function() {$(this).fadeTo("medium", 1);},
    function() {$(this).fadeTo("medium", 0.5);}
  );


  // Superfish
  $('ul.menu').superfish({
    delay: 500,
    animation: {opacity:'show',height:'show'},  // fade-in and slide-down animation
    speed: 'fast',  // faster animation speed
    autoArrows: true,  // disable drop shadows
    dropShadows: false  // disable drop shadows
  });


  // Mobile-view navigation
	// Create the dropdown base
	$("<select class=\"mobile-nav\" />").appendTo(".nav");

	// Create default option "Go to..."
	$("<option />", {
	   "selected": "selected",
	   "value"   : "",
	   "text"    : "Navigate to..."
	}).appendTo(".nav select");

	// Populate dropdown with menu items
	$(".nav a").each(function() {
		var el = $(this);
		$("<option />", {
			"value"   : el.attr("href"),
			"text"    : el.text()
		}).appendTo(".nav select");
	});

	$(".nav select").change(function() {
		window.location = $(this).find("option:selected").val();
	});


}); // END
