<?php

/* add new tab called "mytab" */

add_filter('um_account_page_default_tabs_hook', 'my_custom_tab_in_um', 100 );
function my_custom_tab_in_um( $tabs ) {
	$tabs[800]['galeriesTab']['icon'] = 'um-faicon-paint-brush';
	$tabs[800]['galeriesTab']['title'] = 'Mijn galeries';
	$tabs[800]['galeriesTab']['custom'] = true;
  $tabs[800]['fotosTab']['icon'] = 'um-icon-ios-photos';
	$tabs[800]['fotosTab']['title'] = 'Mijn foto\'s';
	$tabs[800]['fotosTab']['custom'] = true;
	return $tabs;
}

/* make our new tab hookable */

// add_action('um_account_tab__galeriesTab', 'um_account_tab__galeriesTab');
function um_account_tab__galeriesTab( $info ) {
	global $ultimatemember;
	extract( $info );

	$output = $ultimatemember->account->get_tab_output('galeriesTab');
	if ( $output ) { echo $output; }
}
function um_account_tab__fotosTab( $info ) {
	global $ultimatemember;
	extract( $info );

	$output = $ultimatemember->account->get_tab_output('fotosTab');
	if ( $output ) { echo $output; }
}

/* Finally we add some content in the tab */

add_filter('um_account_content_hook_galeriesTab', 'um_account_content_hook_galeriesTab');
add_filter('um_account_content_hook_fotosTab', 'um_account_content_hook_fotosTab');
function um_account_content_hook_galeriesTab( $output ){
	ob_start();
  $id= get_current_user_id();
  global $wpdb;
  $galleries= $wpdb->get_results($wpdb->prepare(
    "SELECT id,naam from galleries where gebruikersID=%d",array($id)
  ),"ARRAY_A");
  //output;
  ?>
	<script src="/wp-content/themes/createwise-gallery/scripts/UMCustom.js"></script>
  <table>
    <tr>
      <th>#</th>
      <th>galerie naam</th>
      <th>galerie aanpassen</th>
      <th>galerie verwijderen</th>
    </tr>
    <?php foreach ($galleries as $key => $value) {
      ?>
      <tr>
        <td><?= $key+1 ?></td>
        <td><?= $value["naam"] ?></td>
        <td><a role="button" href='/maak-een-galerij/?id=<?= $value["id"] ?>'>galerie aanpassen</a></td>
        <td><div role="button" class="del-gallery btn" data-id='<?= $value["id"] ?>' >galerie verwijderen</div></td>
      </tr>
      <?php
    }
    ?>
  </table>
  <?php

	$output .= ob_get_contents();
	ob_end_clean();
	return $output;
}
function um_account_content_hook_fotosTab( $output ){
	ob_start();
  $id= get_current_user_id();
  global $wpdb;
  $fotos= $wpdb->get_results($wpdb->prepare(
    "SELECT naam,uploadid as id FROM `ArtPiecesUploads` where userid=%d ",array($id)
  ),"ARRAY_A");
  //output;
  ?>
  <table>
    <tr>
      <th>#</th>
      <th>foto naam</th>
      <!-- <th>galerie aanpassen</th>
      <th>galerie verwijderen</th> -->
    </tr>
    <?php foreach ($fotos as $key => $value) {
      ?>
      <tr>
        <td><?= $key+1 ?></td>
        <td><?= $value["Naam"] ?></td>
        <!-- <td><a role="button" href='/maak-een-galerij/?id=<?= $value["id"] ?>'>galerie aanpassen</a></td>
        <td><button data-id='<?= $value["id"] ?>' >galerie verwijderen</td> -->
      </tr>
      <?php
    }
    ?>
  </table>
  <?php

	$output .= ob_get_contents();
	ob_end_clean();
	return $output;
}

add_action('wp_ajax_cw_deleteGalleries', 'cw_deleteGalleries'); // for logged in user

function cw_deleteGalleries(){
	$id=$_GET["id"];
	global $wpdb;
	$user= get_current_user_id();
	if($user == $wpdb->get_var($wpdb->prepare("SELECT gebruikersID from galleries where id=%d"),[$id])){
		$wpdb->query($wpdb->prepare("DELETE galleries where id=%d",[$id]));
		$wpdb->query($wpdb->prepare("DELETE gallerycontent where gallery=%d",[$id]));
	}
}
