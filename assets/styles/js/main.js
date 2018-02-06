var PROJECT118 = PROJECT118 || {};

PROJECT118.dashboard = (function($) {
	var listSlide = function() {
          $('.slide-list').css('display','none');
          $(".slide-list-toggle").click(function(){
               $(this).siblings(".slide-list").slideToggle();
          });

	};

	return {
		listSlide: listSlide
	};

})(jQuery);

jQuery(document).ready(function() {
	PROJECT118.dashboard.listSlide();
	$(".login-form").attr("autocomplete", "off"); 
});
