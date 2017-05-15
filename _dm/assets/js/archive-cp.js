function addClass () {
    var el = $(".grid-item");
    var index = 0;

    var delay = setInterval( function(){
        if ( index <= el.length ){
            $( el[ index ] ).removeClass('is-hidden').addClass('animated fadeInUp');
            index += 1;
        }else{
            clearInterval( delay );
        }
    }, 150 );
}

jQuery(function () {
    addClass();
});