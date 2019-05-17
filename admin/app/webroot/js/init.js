(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $(document).on('click', '.message', function () {
        $(this).hide();
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
