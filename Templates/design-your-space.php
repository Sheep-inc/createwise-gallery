<?php
function galleryMakePage(){
  $items=10;
?>

<form action="/action_page.php">
  <label for="fname">Galerij naam:</label>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname">Beschrijving:</label>
  <textarea  id="w3review" name="w3review" rows="4" cols="50"></textarea>
    <br>
  <label for="fname">Is dit een prive galerij?</label>
  <input type="checkbox"><br><br>
  <input type="file" id="FileUploadArt" name="filename"><br><br>

  <div class=" gallery-make-page row">
    <div class="col-12 col-md-6">
      <img src="/wp-content/themes/createwise-gallery/images/template.png">
    </div>
    <div class="col-12 col-md-6">
      <?php
      for($i=0;$i<$items;$i++){
       ?>
       <label>Foto:<?= $i+1?></label>
       <p class="name_p_space" data-id="<?= $i?>">selecteer een afbeelding</p>
      <input type="hidden" name="foto_<?=$i?>">
      <?php
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  id="modalContent">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="/wp-content/themes/createwise-gallery/scripts/gallery-make.js"></script>
<?php
}
add_shortcode('makeGallery', 'galleryMakePage')
 ?>
