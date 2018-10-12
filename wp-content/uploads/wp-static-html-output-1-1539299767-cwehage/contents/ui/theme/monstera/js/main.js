// Set jQuery $ variable
(function ($) {
   $(document);

// Enable responsive menus
( function( window, $, undefined ) {
  'use strict';
 
  $( '.main-navigation, .secondary-nav' ).before( '<button class="menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to menus
  $( '.main-navigation .sub-menu, .secondary-nav .sub-menu' ).before( '<button class="sub-menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to sub menus
 
  // Show/hide the navigation
  $( '.menu-toggle, .sub-menu-toggle' ).on( 'click', function() {
    var $this = $( this );
    $this.attr( 'aria-pressed', function( index, value ) {
      return 'false' === value ? 'true' : 'false';
    });
 
    $this.toggleClass( 'activated' );
    $this.next( 'nav, .sub-menu' ).slideToggle( 'fast' );
 
  });
 
})( this, jQuery );

//Init Flickity
var flickContainer = document.querySelector('.main-gallery');
if ( flickContainer != null ){
imagesLoaded( flickContainer, function() {
  $('.main-gallery').flickity({
    // options
    cellAlign: 'left',
    cellSelector: '.home-gallery-cell',
    wrapAround: true,
    pageDots: false,
    imagesLoaded: true,
    autoPlay: parseInt( MonsteraSlider.delay, 10 ),
    draggable: eval( MonsteraSlider.draggable ),
    prevNextButtons: eval( MonsteraSlider.arrows ),
    selectedAttraction: 0.015,
    friction: 0.3,
    arrowShape: 'M 0,50 L 60,00 L 50,30 L 80,30 L 80,70 L 50,70 L 60,100 Z'
  });
});

var imgLoad = imagesLoaded( flickContainer );
var $gallery = jQuery('.main-gallery');
var $gallerycells = $gallery.find('.home-gallery-cell');

  imgLoad.on( 'done', function( instance ) {
  $gallerycells.css( "opacity", "1" );
});
}

//Enable or Disable sticky for secondary menu
$(document).ready(function() {
  var $navHeight = $('.primary-nav-container');
    if (PrimaryNavParams.sticky == '1') {
      $( ".primary-nav-container" ).addClass( "nav-sticky" );
      $( "#masthead" ).css("padding-top", $navHeight.outerHeight());
  }
});

//Support display of share icons on click
$(".share-icon").click(function(){
    $(".share-hidden").toggle(400);
});

//Enable smooth scroll
$(document).ready(function(){
  $('a[href^="#top"]').on('click',function (e) {
      e.preventDefault();

      var target = this.hash;
      var $target = $(target);

      $('html, body').stop().animate({
          'scrollTop': $target.offset().top
      }, 900, 'swing' );
  });
});

}(jQuery)); //End jQuery



