jQuery(document).ready(function ($) {

    var contentSwitch = $( '.demo-content' ),
        iframeSwitch = $( '.device iframe' ),
        windowWidth = $(window).width(),
        windowHeight = $(window).height() - $( '.navbar' ).height();

    // Set desktop iframe size
    if( contentSwitch.hasClass( 'content-maximized' ) ) {
        iframeSwitch.css({
            'width': windowWidth,
            'height': windowHeight
        });
    }

    $( '.theme-switcher li' ).click(function() {

        var classSwitch = $( this ).attr( 'class' ),
            deviceSwitch = $( '.device' );

        // Add active menu
        $( '.theme-switcher li' ).removeClass('active');
        $(this).addClass('active');

        // Check landscape orientation
        if( deviceSwitch.hasClass('device-landscape') ) {
            deviceSwitch.removeClass( 'device-landscape' );
        }

        // Check desktop maximized content
        if( contentSwitch.hasClass('content-maximized') ) {
            contentSwitch.removeClass( 'content-maximized' );
        }

        // Device switcher
        switch ( classSwitch ) {

            // Mobile - Portrait
            case 'mobile-portrait':
                iframeSwitch.css({
                    'width': '320px',
                    'height': '568px'
                });
                break;

            // Mobile - Landscape
            case 'mobile-landscape':
                iframeSwitch.css({
                    'width': '568px',
                    'height': '320px'
                });

                deviceSwitch.addClass( 'device-landscape' );
                break;

            // Tablet - Portrait
            case 'tablet-portrait':
                iframeSwitch.css({
                    'width': '768px',
                    'height': '1024px'
                });
                break;

            // Tablet - Landscape
            case 'tablet-landscape':
                iframeSwitch.css({
                    'width': '1024px',
                    'height': '768px'
                });

                deviceSwitch.addClass( 'device-landscape' );
                break;

            // Desktop
            case 'desktop':
                iframeSwitch.css({
                    'width': windowWidth,
                    'height': windowHeight
                });

                contentSwitch.addClass( 'content-maximized' );
                break;
        }

    });

});