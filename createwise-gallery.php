<?php
/**
*  Plugin Name: Createwise-gallery
*/

/*
  create tables

  galleries

  CREATE TABLE `crypfexn_wp187`.`galleries` ( `id` INT NOT NULL AUTO_INCREMENT , `naam` VARCHAR(40) NOT NULL , `ruimte` VARCHAR(80) NOT NULL , `gebruikersID` INT NOT NULL , `beschrijving` TEXT NOT NULL , `prive` BOOLEAN NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

  gallery content

  CREATE TABLE `crypfexn_wp187`.`gallerycontent` ( `id` INT NOT NULL AUTO_INCREMENT , `kunstid` INT NOT NULL , `gallery` INT NOT NULL , `location` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

  art works

  CREATE TABLE `crypfexn_wp187`.`artPieces` ( `id` INT NOT NULL , `postid` INT NOT NULL , `naam` VARCHAR(60) NOT NULL , `beschrijving` TEXT NOT NULL , `nsfw` BOOLEAN NOT NULL ) ENGINE = MyISAM;

*/
// function getArtOfUser(){
//   global $wpdb;
//   $user= get_current_user_id()
//   $art=$wpdb->get_results($wpdb->prepare("SELECT * artPieces ap
//     inner join wpox_posts p on ap.postid= p.id
//     where p.post_author=%d",array($user)),"ARRAY_A");
//   return $art;
// }

// define('MAX_UPLOAD_SIZE', 200000);
// define('TYPE_WHITELIST', serialize(array(
//   'image/jpeg',
//   'image/png',
//   'image/gif'
//   )));
//
// function sui_form_shortcode(){
//
//   if(!is_user_logged_in()){
//
//     return '<p>You need to be logged in to submit an image.</p>';
//
//   }
//   if(isset( $_POST['sui_upload_image_form_submitted'] ) && wp_verify_nonce($_POST['sui_upload_image_form_submitted'], 'sui_upload_image_form') ){
//
//   $result = sui_parse_file_errors($_FILES['sui_image_file'], $_POST['sui_image_caption']);
//
//   if($result['error']){
//
//     echo '<p>ERROR: ' . $result['error'] . '</p>';
//
//   }else{
//
//     $user_image_data = array(
//       'post_title' => $result['caption'],
//       'post_status' => 'pending',
//       'post_author' => $current_user->ID,
//       'post_type' => 'user_images'
//     );
//
//     if($post_id = wp_insert_post($user_image_data)){
//
//       sui_process_image('sui_image_file', $post_id, $result['caption']);
//
//       wp_set_object_terms($post_id, (int)$_POST['sui_image_category'], 'sui_image_category');
//
//     }
//   }
// }
// }


// function

//loadGalleryOverview
