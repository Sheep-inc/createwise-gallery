<?php

function um_mycustomtab_add_tab( $tabs ) {

	$tabs[ 'galleries' ] = array(
		'name'   => 'Galeries',
		'icon'   => 'um-faicon-paint-brush',
		'custom' => true
	);

	UM()->options()->options[ 'profile_tab_' . 'galleries' ] = true;

	return $tabs;
}
add_filter( 'um_profile_tabs', 'um_mycustomtab_add_tab', 1000 );

/**
 * Render tab content
 *
 * @param array $args
 */
function um_profile_content_galleries_default( $args ){
  global $wpdb;
	/* START. You can paste your content here, it's just an example. */
  $action = 'mycustomtab';
  ?>

	<div class="um">
		<!-- enter gallery overview shit -->
    <div id="galleryHolder" class="row">
    <?php
    $cards=[];
    $cards = $wpdb->get_results(
        "SELECT g.id as ID,g.naam as Name,u.user_nicename as user , img.filepath as url , ud.propvalue as is18p from galleries g
        inner join wpox_users u on u.id = g.gebruikersID
        inner join gallerycontent gc on gc.gallery = g.id and location =1
        inner join wpox_wfu_log img on img.uploadid = gc.kunstid
				inner join wpox_wfu_userdata ud on ud.uploadid= gc.kunstid and ud.propkey ='Is dit 18+ content'
        where prive=0 and u.id=".um_profile_id(),
    "ARRAY_A");
    foreach ($cards as $card) {
      // code...
      ?>
      <div class="galleryCard col-md-4 col-sm-12">
        <div class="card">
          <a href="/galerij/?id=<?= $card['ID'] ?>">
            <?= $card['Name'] ?>:<br>
            <img src="<?= $card['url'] ?>" class="card-img-top <?= $card['is18p']=="true"?"nsfw":"" ?>" alt="<?= $card['name'] ?>">
            </a>
            <div class="card-body">
              <h5 class="card-title"><a href="/user/<?= $card['user'] ?>"><?= $card['user'] ?></a></h5>
            </div>
          </div>
        </div>
                <?php
    } ?>
    </div>
	</div>

	<?php
	/* END. You can paste your content here, it's just an example. */
}
add_action( 'um_profile_content_galleries_default', 'um_profile_content_galleries_default' );
