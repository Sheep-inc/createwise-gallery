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
  </div>
  <script refer src="/wp-content/themes/createwise-gallery/scripts/galleryOverview.js"></script>
  </body>
</html>
