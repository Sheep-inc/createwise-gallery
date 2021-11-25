<?php
add_action('wp_ajax_cw_loadGalleries', 'cw_loadGalleries'); // for logged in user
add_action('wp_ajax_nopriv_cw_loadGalleries', 'cw_loadGalleries');

//loadGalleryOverview
function galleryLibrary($options=[],$user=null){
  global $wpdb;
  $ordertypes=[
    " g.naam ASC ",
    " g.naam DESC "
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
        // $options[$key]=
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
     where prive=0 AND g.naam like %s ".$whereStr,
      $params
  ));
  $params[]=$curOptions["page"];
  // var_dump($params);
  $cards = $wpdb->get_results(
    $wpdb->prepare(
      //add username
    "SELECT g.id as ID,g.naam as Name,u.display_name as user, g.views from galleries g
    inner join wpox_users u on g.gebruikersID = u.id
     where prive=0 AND g.naam like %s
     order by ".$ordertypes[$curOptions["ordertype"]]."
     Limit %d ,12",
      $params
    ),
  "ARRAY_A");

  return array("cards"=>$cards,"items"=>100);//$items);
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
