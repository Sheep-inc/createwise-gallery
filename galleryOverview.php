<?php
add_action('wp_ajax_loadGalleryOverview', 'cw_loadGalleries'); // for logged in user
add_action('wp_ajax_nopriv_loadGalleryOverview', 'cw_loadGalleries');
function
//loadGalleryOverview
function galleryLibrary($options=[],$user=null){
  global $wpdb;
  $ordertypes=[
    " c.Name ASC ",
    " c.Name DESC "
  ];
  $cardDefaultOptions=[
    "ordertype"=>0,
    "search"=>"",
  ];
  $curOptions=[];
  $params=[];
  foreach($cardDefaultOptions as $key=>$value){
    if(isset($options[$key]) && $options[$key]!==""){
      if($key=="ordertype"){
        if($options[$key] >= count($ordertypes)){
          $curOptions[$key]=0;
        }else{
          $curOptions[$key]=$options[$key];
        }
      }elseif($key=="page"){
        if(is_numeric($options["page"]) && intval($options["page"]) >=1 ){
          $curOptions["page"]=(intval($options[$key])-1)*12;
        }else{
          $curOptions["page"]=0;
        }
      }else{
        $curOptions[$key]= $options[$key];
      }
    }else{
      $curOptions[$key]= $value;
    }
  }
  $params[]="%".$curOptions["search"]."%";
  $whereStr="";
  $cards=[];
  $items = $wpdb->get_var($wpdb->prepare(
    "SELECT count(*) from galleries g
     where hidden=0 AND c.Name like %s ".$whereStr,
      $params
  ));
  $params[]=$curOptions["page"];
  // var_dump($params);
  $cards = $wpdb->get_results(
    $wpdb->prepare(
    "SELECT g.id as ID,g.name as Name from galleries g
     where private=0 AND g.Name like %s
     order by ".$ordertypes[$curOptions["ordertype"]]."
     Limit %d ,12",
      $params
    ),
  "ARRAY_A");

  return array("cards"=>$cards,"items"=>$items);
}

function cw_loadGalleries(){
  if(isset($_POST["json"])){
    $data =$_POST["json"];
    $options = json_decode(str_replace("\\\"","\"",($data)),true);
  }else{
    $options=[];
  }
  $user=null;
  if(!empty($_GET["user"])){
    // $user=$_GET["user"];
  }
  echo json_encode(galleryLibrary($options,$user));
  wp_die();
}

//
// add_shortcode('greeting', 'wpb_demo_shortcode');
// function wpb_demo_shortcode() {
//
// // Things that you want to do.
// $message = 'Hello world!';
//
// // Output needs to be return
// return $message;
// } 
