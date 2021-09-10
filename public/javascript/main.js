if ( window.history.replaceState ) {  
    window.history.replaceState( null, null, window.location.href );
}

$( document ).ready(function() {
    $(".nav-menu").click(function() {
        if($('.nav-links').css('display') == 'none') {
            $('.nav-links').css('display', 'block');
        } else {
            $('.nav-links').css('display', 'none');
        }
    })
});

