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
require_once( get_stylesheet_directory(). '/customUserAccountTabs.php' );
require_once( get_stylesheet_directory(). '/userGalleries.php' );
require_once( get_stylesheet_directory(). '/galleryOverview.php' );
require_once( get_stylesheet_directory(). '/Templates/aframe.php' );
require_once( get_stylesheet_directory(). '/Templates/galery-overview.php' );
require_once( get_stylesheet_directory(). '/Templates/design-your-space.php' );
// require_once( get_stylesheet_directory(). '/createwise-gallery.php' );
require_once( get_stylesheet_directory(). '/imgupload.php' );
function quarty_child_stylesheets() {
	wp_enqueue_style( 'CWG-style', "/wp-content/themes/createwise-gallery" . '/style.css', array( 'neve-style' ), '1.0.0' );
	// if( is_page(ID) ) {
		// wp_enqueue_script('js-file', 'PATH_TO_JS_FILE', array('jquery'), '', false);
		//or use the version below if you know exactly where the file is
		wp_enqueue_script( 'js-file', str_ireplace("neve","createwise-gallery",get_template_directory_uri()) . '/scripts/main.js');
	// }
}
add_action( 'wp_enqueue_scripts', 'quarty_child_stylesheets' );
function collectiveray_load_js_script() {

}
// function neve_child_load_css() {
// 		wp_enqueue_style( 'neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . '/styling/style.css', array( 'neve-style' )," 1.0.0" );
// }
// add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 1 );

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

// function GetGalleryImages($user){
// 	global $wpdb;
// 	$artworks= $wpdb->get_results($wpdb->prepare("SELECT * from wpox_wfu_log l
//
// 	where userid=%d",array($user)));
//
// }
//
//


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
	$conversionRate=600;
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
function my_wp_is_mobile() {
    static $is_mobile;

    if ( isset($is_mobile) )
        return $is_mobile;

    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        $is_mobile = false;
    } elseif (
        strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
            $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
            $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}
