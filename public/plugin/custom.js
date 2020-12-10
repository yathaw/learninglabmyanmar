$(document).ready(function(){


    $(".favouriteBtn").click(function() {
	  	if ( $(this).hasClass( "deactivate" ) ) {
	    	$(this).removeClass("deactivate")
	  	}
	  	if ( $(this).hasClass( "active" ) ) {
	    	$(this).addClass("deactivate")
	  	}
	  	$(this).toggleClass("animate");
	  	$(this).toggleClass("active");
	  	$(this).toggleClass("inactive");
	});

	

	// Read More [ Description ]
    $(".expand-toggle").click(function (e) {
          e.preventDefault();

        var $this = $(this);
        var expandHeight = $this.prev().find(".inner-bit").height();

        if ($this.prev().hasClass("expanded")) {
            $this.prev().removeClass("expanded");
            $this.prev().attr("style", "");
            $this.html("Show more <i class='bx bxs-chevron-down mr-3' ></i>");
        } else {
            $this.prev().addClass("expanded");
            $this.prev().css("max-height", expandHeight);
            $this.html("Show less <i class='bx bxs-chevron-up mr-2' ></i>");
        }
    });	

    $('[data-toggle=tooltip]').tooltip();

    $('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  navText: [
    "<i class='fa fa-caret-left'></i>",
    "<i class='fa fa-caret-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 2
    },
    1000: {
      items: 4
    }
  }
})

});