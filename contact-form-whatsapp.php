<?php
/**
 * Plugin Name:     Contact Form WhatsApp
 * Plugin URI:      https://solusipress.com/
 * Description:    	Contact Form that send to WhatsApp Messenger
 * Author:          Yerie Piscesa
 * Author URI:      https://solusipress.com/
 * Text Domain:     contact-form-whatsapp
 * Version:         0.9.0
 */

add_action( 'wp_enqueue_scripts', 'sp_enqueue_styles_scripts' );
function sp_enqueue_styles_scripts() {
	
	wp_register_script( 'sp-contact-form-wa', 
		plugin_dir_url( __FILE__ ) . '/assets/contact-form-wa.js', 
		[ 'jquery' ], '1.0.0', true 
	);    
	
	wp_register_style( 'sp-css-grid', plugin_dir_url( __FILE__ ) . '/assets/contact-form-wa.css', array(), '1.0.0-4' );

}

add_shortcode( 'sp_contact_wa', 'sp_form_contact_whatsapp' );
function sp_form_contact_whatsapp( $atts ) {
    $purpose = '';
    $phone = '';
    if( isset( $atts['purpose'] ) && $atts['purpose'] != '' ) {
        $purpose = $atts['purpose'];
    }
    if( isset( $atts['phone'] ) && $atts['phone'] != '' ) {
        $phone = $atts['phone'];
    }
	wp_enqueue_style( 'sp-css-grid' );
    wp_localize_script( 'sp-contact-form-wa', 'sp_contact_form', [
        'phone' => $phone,
        'purpose' => $purpose
    ] );
    wp_enqueue_script( 'sp-contact-form-wa' );
    $html = '';
    ob_start();
    include plugin_dir_path( __FILE__ ) . '/sc-form-wa.php';   
    $html = ob_get_contents();
    ob_end_clean();
    
    return $html;
}

add_action( 'eighteen_tags_loop_after', function(){ 
	echo do_shortcode( '[sp_contact_wa phone="6281314997198" purpose="ingin diskusi aja"]' );	
} );
