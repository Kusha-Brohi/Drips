

	$(function () {
		var filterList = {
			init: function () {
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixItUp({
  				selectors: {
    			  target: '.portfolio',
    			  filter: '.filter'	
    		  },
    		  load: {
      		  filter: '.heading1, .heading2, .heading3, .heading4'  
      		}     
				});								
			}
		};
		// Run the show!
		filterList.init();
	});


 $(document).ready(function() {
  $(".fancybox").fancybox();
  
 });




// -------------------------------------------------------------
    // Back To Top  
    // -------------------------------------------------------------

    (function () {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 400) {
                $('.scroll-up').fadeIn();
            } else {
                $('.scroll-up').fadeOut();
            }
        });
    }());
	


// -------------------------------------------------------------
    // Back To Top  
    // -------------------------------------------------------------




// -------------------------------------------------------------
    // Fancy Gallery Start  
    // -------------------------------------------------------------

$(document).ready(function () {$('.fb').fancybox();});
// -------------------------------------------------------------
    // Fancy Gallery End 
    // -------------------------------------------------------------


// -------------------------------------------------------------
    // ScrollBar Start
    // -------------------------------------------------------------

jQuery(document).ready(function(){
    jQuery('.scrollbar-inner').scrollbar();
});
// -------------------------------------------------------------
    // ScrollBar End 
    // -------------------------------------------------------------

// -------------------------------------------------------------
    // Loader Start 
    // -------------------------------------------------------------

window.onload = function(){$('.loader').fadeOut();}


// -------------------------------------------------------------
    // Loader End
    // -------------------------------------------------------------



$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})    


$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});


/*  $(window).load(function(){
                $('#onload').modal('show');
            });*/