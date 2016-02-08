/**
* This file adds some LIVE to the Theme Customizer live preview. To leverage
* this, set your custom settings to 'postMessage' and then add your handling
* here. Your javascript should grab settings from customizer controls, and 
* then make any necessary changes to the page using jQuery.
*/
( function( $ ) {

        // Update the site title in real time...
        wp.customize( 'blogname', function( value ) {
                value.bind( function( newval ) {
                        $( '#site-title a' ).html( newval );
                } );
        } );

        //Update the site description in real time...
        wp.customize( 'blogdescription', function( value ) {
                value.bind( function( newval ) {
                        $( '.site-description' ).html( newval );
                } );
        } );

        //Update site background color...
        wp.customize( 'background_color', function( value ) {
                value.bind( function( newval ) {
                        $('body').css('background-color', newval );
                } );
        } );

        //Update site header background color in real time...
        wp.customize( 'header_color', function( value ) {
                value.bind( function( newval ) {
                        $('#header').css('background-color', newval );
                } );
        } );

        //Update site header text color in real time...
        wp.customize( 'header_textcolor', function( value ) {
                value.bind( function( newval ) {
                        $('.navbar-brand, .navbar li a').css('color', newval );
                } );
        } );

        
        wp.customize( 'block_background_color', function( value ) {
                value.bind( function( newval ) {
                        $('.block, #sidebar-wrapper').css('background-color', newval );
                } );
        } );
        
} )( jQuery );
