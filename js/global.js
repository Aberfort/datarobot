;
(function ($) {

  // Scripts which runs after DOM load

  $(document).ready(function () {



// init Isotope
    var $grid = $('.grid').isotope({
      itemSelector: '.careers__item1',
      layoutMode: 'fitRows'
    });

// bind filter on select change
    $('.filters-select').on( 'change', function() {
      // get filter value from option value
      var filterValue = this.value;

      $grid.isotope({ filter: filterValue });
    });

  });


  // Scripts which runs after all elements load

  $(window).load(function () {

    //jQuery code goes here


  });

  // Scripts which runs at window resize

  $(window).resize(function () {

    //jQuery code goes here


  });

}(jQuery));
