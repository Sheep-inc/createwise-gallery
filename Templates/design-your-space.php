<?php
function galleryMakePage(){
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
  <input type="submit" value="<?php echo !empty($_GET["id"])?"Update galerij":"Maak galerij" ?>">
  <div class=" gallery make page">
    <img>
    
  </div>
</form>
<?php
}
add_shortcode('makeGallery', 'galleryMakePage')
 ?>
