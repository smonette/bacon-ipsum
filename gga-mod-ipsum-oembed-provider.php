<?php


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


add_action('init', 'gga_modipsum_wp_oembed_add_provider');

function gga_modipsum_wp_oembed_add_provider() {
	wp_oembed_add_provider( '#https?://(www\.)?modipsum\.com/*#i', 'http://modipsum.com/oembed', true );
}




/* 

TO DO

This doesnt seem nessecary for my uses?? 

*/


?>