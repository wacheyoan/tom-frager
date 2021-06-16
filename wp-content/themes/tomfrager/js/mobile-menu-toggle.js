// hide or display the mobile menu

/* let's consider we want to toggle the menu displayed at 800 screen width, here's what we need to do (you can accordingly replace 800 with to a screen width you would need)..*/
function toggle() {
    if ( jQuery( window ).width() >= 800 ) {
        jQuery( '.nav.mobile-menu' ).hide();
        jQuery( '.nav.desktop-menu' ).show();
    } else {
        jQuery( '.nav.desktop-menu' ).hide();
        jQuery( '.nav.mobile-menu' ).show();
        //submenu
        jQuery('.sub-menu').hide();

        jQuery('.menu-toolbar').on('click',function() {
            if (jQuery('.sub-menu').is(":hidden") && !jQuery('.sub-menu').hasClass('hide-sub-menu')) {
                if (!jQuery(".fa-times").length){
                    jQuery('.sub-menu').append("<i class='fas fa-times close-sub-menu'></i>");
                }
                jQuery('.sub-menu').show().addClass('sub-menu-animate')
            } else {
                jQuery('.sub-menu').hide().removeClass('hide-sub-menu');
            }
        });

        jQuery(document).on('click','.fa-times',function() {
            if (jQuery('.sub-menu').is(":visible")) {
                jQuery('.sub-menu').hide().removeClass('sub-menu-animate');
            }
        });

        jQuery('.sub-menu li').on('click',function() {
                jQuery('.sub-menu').hide().removeClass('sub-menu-animate').addClass('hide-sub-menu');
        });

    }
}

// on page load set the menu display initially
jQuery(document).ready(function() {
    toggle();
});

// toggle the menu display on browser resize
jQuery( window ).resize( function () {
    toggle();
} );