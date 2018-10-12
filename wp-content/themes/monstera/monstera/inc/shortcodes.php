<?php

/*** File for creating and adding shortcodes */

/* Large button */
function stnsvn_large_button($atts){
   extract(shortcode_atts(array(
      'url' 		=> 'http://#',
	  'button_text'	=> __('Button Text')
   ), $atts));

   $button_string = '<div class="monstera-button large-button">
                     <a href="'.$url.'">
                     <h4>'.$button_text.'</h4>
                       </a>
                       </div>';
   return $button_string;
}

function stnsvn_small_button($atts){
   extract(shortcode_atts(array(
      'url' 		=> 'http://#',
	  'button_text'	=> __('Button Text')
   ), $atts));

   $button_string = '<div class="monstera-button small-button">
                     <a href="'.$url.'">
                     <h5>'.$button_text.'</h5>
                       <div class="meta-line"></div>
                       </a>
                       </div>';
   return $button_string;
}

function stnsvn_line() {
  
   $line_string = '<div class="stnsvn-line"></div>';
      
   return $line_string;
}

function stnsvn_social() {
  
    ob_start();
    get_template_part( 'template-parts/content', 'social' );
    $output = ob_get_clean();
    return $output;
}

function stnsvn_col_2($atts, $content = null) {
  
   $col_string = '<div class="monstera-column monstera-col-2"><p>'.$content.'</p></div>';
   return $col_string;
}

function stnsvn_col_3($atts, $content = null) {
  
   $col_string = '<div class="monstera-column monstera-col-3"><p>'.$content.'</p></div>';
   return $col_string;
}

function stnsvn_col_4($atts, $content = null) {
  
   $col_string = '<div class="monstera-column monstera-col-4"><p>'.$content.'</p></div>';
   return $col_string;
}

function stnsvn_col_row($atts, $content = null) {
     $col_string = '<div class="monstera-column-row clear">'.do_shortcode($content).'</div>';
   return $col_string;
}

function stnsvn_register_shortcodes(){
   add_shortcode('stnsvn-button-large', 'stnsvn_large_button');
   add_shortcode('stnsvn-button-small', 'stnsvn_small_button');
   add_shortcode('stnsvn-line', 'stnsvn_line');
   add_shortcode('stnsvn-social', 'stnsvn_social');
   add_shortcode('stnsvn-col-2', 'stnsvn_col_2');
   add_shortcode('stnsvn-col-3', 'stnsvn_col_3');
   add_shortcode('stnsvn-col-4', 'stnsvn_col_4');
   add_shortcode('stnsvn-col-row', 'stnsvn_col_row');
}
add_action( 'init', 'stnsvn_register_shortcodes');



?>