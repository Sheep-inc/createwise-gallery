<?php
function galleryOverviewShortCode(){
?>
       <div class="searchHeader col-12 row">
         <div class="searchBar col-sm-8 col-md-10">
           <input id="searchbar" placeholder="Zoeken...">
         </div>
         <div class="searchOptions col-sm-4 col-md-2">
           <select name= "order">
             <option>a-z</option>
             <option>z-a</option>
             <option>populairiteit</option>
           </select>
         </div>
       </div>
       <div id="galleryHolder">
     </div>
     <div>
       <ul class= "pagination">

       </ul>
     </div>
  <script refer src="/wp-content/themes/createwise-gallery/scripts/galleryOverview.js"></script>
  <?php
  }
  add_shortcode('cwGalleryOverview', 'galleryOverviewShortCode')
   ?>
