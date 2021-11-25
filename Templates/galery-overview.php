<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet"  href="/wp-content/themes/createwise-gallery/style/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Galerij_Overzicht</title>
  </head>
  <body>
     <div class="container row mx-auto">
       <h2>Galerij overzicht</h2>
       <div class="searchHeader col-12 row">
         <div class="searchBar col-sm-8 col-md-10">
           <input id="searchbar" placeholder="Zoeken...">
         </div>
         <div class="searchOptions col-sm-4 col-md-2">
           <select name= "order">
             <option value= "0">a-z</option>
             <option value= "1">z-a</option>
             <option value= "2">populairiteit</option>
           </select>
         </div>
       </div>
       <div id="galleryHolder">
         <div class="card galleryCard col-md-4 col-sm-12">
           <a href="https://nl.wiki.forgeofempires.com/index.php?title=Van_Gogh">
             Van Gogh:<br>
             <img src="https://nl.wiki.forgeofempires.com/images/8/89/VAN-GOGH.png" class="card-img-top" alt="...">
             </a>
             <div class="card-body">
               <h5 class="card-title"><a href="/users/jwpancake">JW Pancake</a></h5>
             </div>
         </div>

         <div class="card galleryCard col-md-4 col-sm-12">
           <a href="https://www.youtube.com/watch?v=OXyxn3YS8sg">
             Enzo Knol:<br>
             <img src="https://i.ytimg.com/vi/OXyxn3YS8sg/mqdefault.jpg" class="card-img-top" alt="...">
             </a>
             <div class="card-body">
               <h5 class="card-title"><a href="/users/Sjoerd Janssen">Sjoerd Janssen</a></h5>
             </div>
         </div>

     </div>
     <div class= "pagination"><ul class="mx-auto">

     </ul></div>
  </div>
  <script refer src="/wp-content/themes/createwise-gallery/scripts/galleryOverview.js"></script>
  </body>
</html>
