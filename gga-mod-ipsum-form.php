<?php


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


add_shortcode('gga-mod-ipsum-form', 'gga_mod_ipsum_form');

function gga_mod_ipsum_form($atts) {
	$output = '';

	$form = '
		<p>Does your lorem ipsum text want to be a little bit cuter? Give our generator a try… it’s dazzling!</p>

		<form id="make-it-cutey" action="' . site_url('/') . '" method="get">
			<table>
				<tbody>
				<tr>
					<td>Paragraphs:</td>
					<td><input style="width: 40px;" type="text" name="paras" value="5" maxlength="2" /></td>
				</tr>
				<tr>
					<td>Type:</td>
					<td><input id="all-cute" type="radio" name="type" value="all-cute" checked="checked" /><label for="all-cute">Totally adorbs</label> <input id="cute-and-filler" type="radio" name="type" value="cute-and-filler" /><label for="cute-and-filler">A little adorbs and Filler</label></td>
				</tr>
				<tr>
					<td></td>
					<td><input id="start-with-lorem" type="checkbox" name="start-with-lorem" value="1" checked="checked" /> <label for="start-with-lorem">Start with \'mod ipsum dolor sit amet...\'</label></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Give me sparkle" /></td>
				</tr>
				</tbody>
				</table>
		</form>
	';


	if (isset($_REQUEST["type"])) {

		require_once 'gga-modIpsumGenerator.php';

		$generator = new modIpsumGenerator();
		$number_of_paragraphs = 5;
		if (isset($_REQUEST["paras"]))
			$number_of_paragraphs = intval($_REQUEST["paras"]);

		$output = '';
					
		if ($number_of_paragraphs < 1)
			$number_of_paragraphs = 1;

		if ($number_of_paragraphs > 100)
			$number_of_paragraphs = 100;

		$paragraphs = $generator->Make_Some_cutey_Filler(
			$_REQUEST["type"], 
			$number_of_paragraphs,
			isset($_REQUEST["start-with-lorem"]) && $_REQUEST["start-with-lorem"] == "1");


		$output = '<div>';
		foreach($paragraphs as $paragraph)
			$output .= '<p>' . $paragraph . '</p>';
		 
		$output .= '</div>';
	}



	return $output . $form;

}

?>
