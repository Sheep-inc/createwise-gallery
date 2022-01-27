<?php
function galleryMakePage(){
  //currently hardcoded when more galery type are added this should be loaded dynamically
  $items=10;
  $data=[];
  $images=[];
  if(isset($_GET["id"])){
    global $wpdb;
    $data =$wpdb->get_row($wpdb->prepare(
      "SELECT * from galleries where id=%d and gebruikersID=%d",[$_GET["id"],get_current_user_id()]
    ),"ARRAY_A");
    if(!empty($data)){
      $images= $wpdb->get_results($wpdb->prepare(
        "SELECT * from gallerycontent gc
        inner join ArtPiecesUploads a on a.uploadid = gc.kunstid
        where gc.gallery=%d",[$_GET["id"]]
      ),"ARRAY_A");
    }
  }
  // var_dump($data)
?>
<!-- add edit id functionaliteit -->
<form id="createSpace" method="post">
  <label for="name">Galerij naam:</label>
  <input type="text" id="name" name="name" value="<?= $data["naam"]??""?>" required><br><br>
  <input type="hidden" name="id" value="<?= $data["id"]??""?>">
  <label for="desc">Beschrijving:</label>
  <textarea name="desc" rows="4" cols="50"><?= $data["beschrijving"]??""?></textarea>
    <br>
  <label>Is dit een prive galerij?</label>
  <input name="prive" type="checkbox" <?= isset($data["prive"])&&$data["prive"]?"checked":""?>><br><br>
  <!-- <input type="file" id="FileUploadArt" name="filename"><br><br> -->

  <div class=" gallery-make-page row">
    <div class="col-12 col-md-6">
    <!-- currently hardcoded image should change to show template image of gallery chosen later -->
      <img src="/wp-content/themes/createwise-gallery/images/template.png">
    </div>
    <div class="col-12 col-md-6">
      <?php
      for($i=0;$i<$items;$i++){
       ?>
       <label>Foto:<?= $i+1?></label>
       <? if(isset($images[$i])){
         ?>

         <p class="name_p_space" data-id="<?= $i?>"><?= $images[$i]["Naam"]?> is gekozen</p>
         <input type="hidden" name="foto_<?=$i?>" value="<?= $images[$i]["uploadid"]?>">
         <?php
       }else{
         ?>
         <p class="name_p_space" data-id="<?= $i?>">Selecteer een afbeelding</p>
         <input type="hidden" name="foto_<?=$i?>">
         <?php
        }
      }
       ?>
    </div>
  </div>
  <input type="submit" value="<?php echo !empty($_GET["id"])?"Update galerij":"Maak galerij" ?>">
</form>
<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Afbeelding selecteer scherm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  id="modalContent">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<script src="/wp-content/themes/createwise-gallery/scripts/gallery-make.js"></script>
<?php
}
add_shortcode('makeGallery', 'galleryMakePage');
add_action('wp_ajax_cw_editGalleries', 'cw_editGalleries'); // for logged in user

function cw_editGalleries(){
  global $wpdb;
  $message;
  $params = $_POST;
  $photos= explode(",",$params["fotos"]);
  if(empty($params["name"])){
    $message=[
      "status"=>400,
      "message"=>"geen naam voor galerij opgegeven"
    ];
    cw_returnJson($message);
  }elseif(count($photos)<1){
    $message=[
      "status"=>400,
      "message"=>"geen fotos voor galerij geselecteerd"
    ];
    cw_returnJson($message);
  }
  $id;
  // var_dump($params["prive"],($params["prive"]=="false"?0:1));
  if($params["id"]){
    $creator= $wpdb->get_var($wpdb->prepare("SELECT gebruikersID as user from galleries where id=%d",array(  $params["id"])));
    if($creator!=get_current_user_id()){
      return;
    }
    $wpdb->query($wpdb->prepare("UPDATE galleries set naam=%s,gebruikersID=%d, beschrijving=%s,prive=%d where id=%d",array(
        $params["name"],
        get_current_user_id(),
        $params["desc"],
        ($params["prive"]=="false"?0:1),
        $params["id"]
    )));
    $id=$params["id"];
  }
  else{
    $wpdb->query($wpdb->prepare("INSERT galleries (naam,gebruikersID,beschrijving,prive,ruimte)
     values(%s,%d,%s,%d,'standaard')",array(
        $params["name"],
        get_current_user_id(),
        $params["desc"],
        ($params["prive"]=="false"?0:1)
    )));
    $id=$wpdb->insert_id;
  }
  $i=0;
  $wpdb->query($wpdb->prepare("DELETE from gallerycontent where gallery =%d",array($id)));

  foreach ($photos as $photo) {
    $i++;
    //this is added to skip empty items but keep the location of the painting saved
    if($photo!=""){
      $wpdb->query($wpdb->prepare("INSERT INTO gallerycontent (kunstid,gallery,location) values(%s,%d,%d)",array(
        $photo,$id,$i
      )));
    }
  }

  $message=[
    "status"=>200,
    "message"=>"galerij met de naam ".$params["name"]." opgeslagen"
  ];
  cw_returnJson($message);
}

function cw_returnJson($message){
  echo json_encode($message);
  wp_die();
}
/*
create view ArtPiecesUploads as SELECT f.uploadid,f.userid, metaN.propvalue as Naam,metaB.propvalue as beschrijving,meta18.propvalue as is18p, f.filepath as link from wpox_wfu_log f
inner join wpox_wfu_userdata metaN on f.uploadid = metaN.uploadid and metaN.property="Naam Kunstwerk"
inner join wpox_wfu_userdata metaB on f.uploadid = metaB.uploadid and metaB.property="Beschrijving"
inner join wpox_wfu_userdata meta18 on f.uploadid = meta18.uploadid and meta18.property="is dit 18+ content"
where f.action="upload"
*/
 ?>
