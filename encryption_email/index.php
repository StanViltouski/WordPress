<?php

function encryption_email( $atts ) {
    extract( shortcode_atts( array(
        'type'      => 'email',
        'address'   => '',
        'class'     => '',
        'subject'   => '',
        'text'      => '',

    ), $atts ) );

    switch ( $type ) {
        case 'email' : $protocol = 'mailto:'; break;
        case 'jabber' : $protocol = 'xmpp:'; break;
    }

    if ( $class ) $css = 'class="' . esc_attr( $class ) . '" ';

    if ( $subject ) $subject = '?subject=' . esc_attr( $subject );

    if ( $text == '' ) $text = antispambot( $address );

    /* Just text */
    $output = $protocol . antispambot( $address, 1 ) . $subject ;

    /* HTML link */
    //$output = '<a ' . $css . 'href="' . $protocol . antispambot( $address, 1 ) . $subject . '">' . $text . '</a>';

    return $output;
}

add_shortcode('email', 'encryption_email');



/*=== Show shortcode (add to page) ===*/

echo do_shortcode('[email address=test@test.com]');


/*=== Standart WP decision (https://wp-kama.ru/function/antispambot) ===*/

echo antispambot('test@test.com', 1);