<?php
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
require_once( get_stylesheet_directory(). '/Templates/aframe.php' );
require_once( get_stylesheet_directory(). '/Templates/galery-overview.php' );
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
	$maxH=1200;
	$maxW=2000;
	$conversionRate=1;
	$newH=0;
  $newW=0;
  $_height = $height;
  $_width = $width;

  while ($_width != 0) {
     $remainder = $height % $_width;
     $_height = $_width;
     $_width = $remainder;
  }
  $gcd = abs($_height);
  // return ($height / $gcd)  . ':' . ($width / $gcd);

  $ratioH= ($height / $gcd);
  $ratioW= ($width / $gcd);
	//
  // if($height>3*$conversionRate){
  //   $newH=3*$conversionRate;
  //   $newW= $width/$ratioW*$ratioH;
  // }
	// else{
  //     $newH=$height;
  //     $newW=$width;
  // }
  // if($width>5*$conversionRate){
  //   $newW=5*$conversionRate;
  //   $newH= $width/$ratioH*$ratioW;
  // }
	// else{
  //     $newH=$height;
  //     $newW=$width;
  // }
  // $ratioHe=3*$conversionRate/$height;
  // $ratioWe=5*$conversionRate/$width;
  // echo "width:".$ratioHe." height:".$ratioWe;
	//w5:3h
	if($height>$conversionRate*$maxH||$width>$conversionRate*$maxH){
		if($ratioH>$ratioW){
			$newH=$conversionRate*$maxH;
			$newW= $newH/$ratioH*$ratioW;
		}
		else{
			$newW=$conversionRate*$maxW;
			$newH= $newW/$ratioW*$ratioH;
			if($newH>$conversionRate*$maxH){
				$newH=$conversionRate*$maxH;
				$newW= $newH/$ratioH*$ratioW;
			}
		}
	}else{
		$newH=$height;
		$newW=$width;
	}
	return array("height"=>$newH/$conversionRate,"width"=>$newW/$conversionRate);
}

add_shortcode('sizeTest', 'CWGSizeTest');
function CWGSizeTest(){
  echo json_encode(getImageCanvasSize(1963.08,1880.26))."(1963.08h,1880.26w) <br>";
  echo json_encode(getImageCanvasSize(1860,2800))." (1860h,2800w) <br>";
  echo json_encode(getImageCanvasSize(915.04,2924.67))." (915.04h,2924.67w) <br>";
  echo json_encode(getImageCanvasSize(2000,800))." (2000h,800w) <br>";
  echo json_encode(getImageCanvasSize(500,300))." 500h x 300w <br>";
  echo json_encode(getImageCanvasSize(300,500))." 300h x 500w <br>";



}
