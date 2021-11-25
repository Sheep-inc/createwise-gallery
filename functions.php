height<?php
/**
 * quarty-child functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package quarty-child
 */

/**
 * Enqueue styles.
 */
require_once( get_stylesheet_directory(). '/galleryOverview.php' );
// require_once( get_stylesheet_directory(). '/createwise-gallery.php' );
require_once( get_stylesheet_directory(). '/imgupload.php' );
function quarty_child_stylesheets() {
	wp_enqueue_style( 'CWG-style', get_template_directory_uri() . '/style.css', array( 'quarty-style' ), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'quarty_child_stylesheets' );

// add_action( 'wp_enqueue_scripts', 'create_wise_gallery_styles' );
// function create_wise_gallery_styles() {
//     $parenthandle = 'quarty-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
//     $theme = wp_get_theme();
//     wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
//         array(),  // if the parent theme code has a dependency, copy it to here
//         $theme->parent()->get('Version')
//     );
//     wp_enqueue_style( 'child-style', get_stylesheet_uri(),
//         array( $parenthandle ),
//         $theme->get('Version') // this only works if you have Version in the style header
//     );
// }




/**
* get size of image getImageCanvasSize
* @param $height height of image
* @param $width width of image
**/
function getImageCanvasSize($height,$width){
  //bereken ratio
  //is pixels binnen limiet van h en w
  //
  $newH=0;
  $newW=0;
  $_height = $height;
  $_width = $width;
  $conversionRate=10;
  while ($_width != 0) {
     $remainder = $height % $_width;
     $_height = $_width;
     $_width = $remainder;
  }
  $gcd = abs($_height);
  // return ($height / $gcd)  . ':' . ($width / $gcd);

  $ratioH= ($height / $gcd);
  $ratioW= ($width / $gcd);

  if($height>3*$conversionRate){
    $newH=3*$conversionRate;
    $newW= $width/$ratioW*$ratioH;
  }else{
      $newH=$height;
      $newW=$width;
  }
  if($width>5*$conversionRate){
    $newW=5*$conversionRate;
    $newH= $width/$ratioH*$ratioW;
  }else{
      $newH=$height;
      $newW=$width;
  }
  $ratioHe=3*conversionRate/$height;
  $ratioWe=5*conversionRate/$width;
  echo "width:".$ratioHe."".$ratioWe;
  var_dump($ratioH,$ratioW,$newH,$newW);

}
