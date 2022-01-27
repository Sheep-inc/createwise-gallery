<?php
function galleryShortCode(){
$positions=[
  [
    "x"=>-6.018,
    "y"=>2,
    "z"=>3.59,
    "rotation"=>0
  ],
  [
    "x"=>-0.017,
    "y"=>2,
    "z"=>3.59,
    "rotation"=>0
  ],[
    "x"=>5.975,
    "y"=>2,
    "z"=>3.59,
    "rotation"=>0
  ],
  [
    "x"=>0.011,
    "y"=>2,
    "z"=>-8.3,
    "rotation"=>0
  ],[
    "x"=>6.2,
    "y"=>2,
    "z"=>-8.3,
    "rotation"=>0
  ],[
    "x"=>5.984,
    "y"=>2,
    "z"=>-8.3,
    "rotation"=>90
  ],
  [
    "x"=>8.9,
    "y"=>2,
    "z"=>-5.38,
    "rotation"=>90
  ],[
    "x"=>8.9,
    "y"=>2,
    "z"=>0.606,
    "rotation"=>90
  ],
  [
    "x"=>-8.9,
    "y"=>2,
    "z"=>-5.38,
    "rotation"=>90
  ],[
    "x"=>-8.9,
    "y"=>2,
    "z"=>0.606,
    "rotation"=>90
  ],
]
?>
<script src="https://aframe.io/releases/1.0.3/aframe.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v6.1.0/dist/aframe-extras.min.js"></script>
<?php
echo(wp_is_mobile())?'<script src="/wp-content/themes/createwise-gallery/scripts/nipple.js"></script>':""
?>
<script src="//cdn.rawgit.com/donmccurdy/aframe-physics-system/v4.0.1/dist/aframe-physics-system.min.js"></script>
<style>
.magic-desc-box{
  /* display: none; */
  display: block;
  z-index: 9999999;
  position: fixed;
  right: 0px;
  bottom: 0px;
}
</style>
<script>
  // AFRAME.registerComponent('foo', {
  //   init: function() {
  //     this.el.addEventListener('collide', function(e) {
  //       console.log('Player has collided with ', e.detail.body.el);
  //       e.detail.target.el; // Original entity (playerEl).
  //       e.detail.body.el; // Other entity, which playerEl touched.
  //       e.detail.contact; // Stats about the collision (CANNON.ContactEquation).
  //       e.detail.contact.ni; // Normal (direction) of the collision (CANNON.Vec3).
  //     });
  //   }
  // })

</script>
<body>
<a-scene physics="debug: true" joystick vr-mode-ui="enabled: false">
  <a-entity light="type: ambient"> </a-entity>
  <a-assets>
    <img id="my-image" src="https://picsum.photos/400/400">
    <?php
    // foreach ($variable as $key => $value) {
    //     echo '<a-image position="-8.9 2 0.606" rotation="0 90 0" src="#my-image" ></a-image>
    //           <a-box color="grey" depth="1" height="1" width=".1" position="-9 2 0.606"></a-box>  ';
    // }
    ?>
    <img id="sky" src="https://t4.ftcdn.net/jpg/03/81/81/55/360_F_381815539_CUlqLBRjBFrFnkRNUGaF52eL5fNXSwrU.jpg">
    <img id="floor" src="/wp-content/themes/createwise-gallery/images/concretefloor3.jpg">
  </a-assets>
  <!-- Camera Entity -->
  <a-entity id="cameraHolder" width="0" depth="0" position="0 2 0">
  <a-entity id="camera" camera look-controls wasd-controls="acceleration: 300" kinematic-body></a-entity>
  </a-entity>
    <a-box
      static-body=""
      position="-9.26 2 -2.35"
      width=".5" height="4" depth="13"
      color="#23282b"
    ></a-box>

    <a-box
      static-body=""
      position="9.26 2 -2.35"
      width=".5" height="4" depth="13"
      color="#23282b"
    ></a-box>

    <a-box
      static-body=""
      position="0 2 -8.63"
      width="19" height="4" depth="0.5"
      color="#23282b"
    ></a-box>

    <a-box
      static-body=""
      position="0 2 3.9"
      width="19" height="4" depth="0.5"
      color="#23282b"
    ></a-box>

    <a-plane
      static-body=""
      rotation="-90 0 0"
      position="0 0 -2.35" width="20" height="13"
      src="#floor"
      repeat="5 3"
      normal-map="#floor"
      normal-texture-repeat="5 3"
      roughness="0.8"
    ></a-plane>

    <a-image position="-6.018 2 3.59" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="-6.018 2 3.65" rotation="0 90 0"></a-box>

    <a-image position="-0.017 2 3.59" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="-0.017 2 3.65" rotation="0 90 0"></a-box>

    <a-image position="5.975 2 3.59" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="5.975 2 3.65" rotation="0 90 0"></a-box>

    <a-image position="-5.984 2 -8.3" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="-5.984 2 -8.4" rotation="0 90 0"></a-box>

    <a-image position="0.011 2 -8.3" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="0.011 2 -8.4" rotation="0 90 0"></a-box>

    <a-image position="6 2 -8.3" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="6 2 -8.4" rotation="0 90 0"></a-box>

    <a-image position="8.9 2 -5.38" rotation="0 90 0" src="#my-image" ></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="9 2 -5.38"></a-box>

    <a-image position="8.9 2 0.606" rotation="0 90 0" src="#my-image" ></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="9 2 0.606"></a-box>

    <a-image position="-8.9 2 -5.38" rotation="0 90 0" src="#my-image" ></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="-9 2 -5.38"></a-box>

    <a-image position="-8.9 2 0.606" rotation="0 90 0" src="#my-image" ></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="-9 2 0.606"></a-box>

    <a-text  position="-5 2 2"  text="value: eet je schoen maar op">
  <a-sky src="#sky"></a-sky>
</a-scene>
<!-- <div class="magic-desc-box">
  LOOK MOM IM ON TV
</div> -->
</body>
<?php
}
add_shortcode('cwGallery', 'galleryShortCode')
 ?>
