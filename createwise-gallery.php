<?php
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

// function

//loadGalleryOverview
