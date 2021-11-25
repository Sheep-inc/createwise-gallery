<script src="https://aframe.io/releases/1.0.3/aframe.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/donmccurdy/aframe-extras@v6.1.0/dist/aframe-extras.min.js"></script>
<script src="//cdn.rawgit.com/donmccurdy/aframe-physics-system/v4.0.1/dist/aframe-physics-system.min.js"></script>
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
<a-scene physics="debug: true">
  <a-assets>
    <img id="my-image" src="https://picsum.photos/400/400">
    <img id="sky" src="https://t4.ftcdn.net/jpg/03/81/81/55/360_F_381815539_CUlqLBRjBFrFnkRNUGaF52eL5fNXSwrU.jpg">
    <img id="wall" src="/wp-content/themes/createwise-gallery/images/Concrete.jpg">
  </a-assets>
  <a-entity id="cameraHolder" width="0" depth="0"  position="0 1.6 0">
    <!-- Camera Entity -->
    <a-entity id="camera" camera look-controls wasd-controls="acceleration: 300" kinematic-body></a-entity>
  </a-entity>
    <a-box
      static-body=""
      position="-9.75 1.5 -4"
      width=".5" height="3" depth="10"
      src="#wall"
      repeat="2 1"
      normal-map="#wall"
      normal-texture-repeat="2 1"
    ></a-box>

    <a-box
      static-body=""
      position="9.75 1.5 -4"
      width=".5" height="3" depth="10"
      src="#wall"
      repeat="2 1"
      normal-map="#wall"
      normal-texture-repeat="2 1"
      roughness="0.8"
      normal-scale="-4 1"

    ></a-box>

    <a-box
      static-body=""
      position="0 1.5 -8.75"
      width="20" height="3" depth="0.5"
      src="#wall"
      repeat="3 1"
      normal-map="#wall"
      normal-texture-repeat="3 1"
      roughness="0.8"
    ></a-box>

    <a-box
      static-body=""
      position="0 1.5 1.2"
      width="20" height="3" depth="0.5"
      src="#wall"
      repeat="3 1"
      normal-map="#wall"
      normal-texture-repeat="3 1"
      roughness="0.8"
    ></a-box>

    <a-plane
      static-body=""
      rotation="-90 0 0"
      position="0 0 -4" width="20" height="10"
      src="#wall"
      repeat="3 2"
      normal-map="#wall"
      normal-texture-repeat="3 2"
      roughness="0.8"
    ></a-plane>

    <a-image position="4.75 1.5 0.89" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="4.75 1.5 0.95" rotation="0 90 0"></a-box>

    <a-image position="-4.75 1.5 0.89" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="-4.75 1.5 0.95" rotation="0 90 0"></a-box>

    <a-image position="0 1.5 0.89" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="0 1.5 0.95" rotation="0 90 0"></a-box>

    <a-image position="4.75 1.5 -8.43" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="4.75 1.5 -8.5" rotation="0 90 0"></a-box>

    <a-image position="0 1.5 -8.43" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="0 1.5 -8.5" rotation="0 90 0"></a-box>

    <a-image position="-4.75 1.5 -8.43" src="#my-image"></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="-4.75 1.5 -8.5" rotation="0 90 0"></a-box>

    <a-image position="9.44 1.5 -6.25" rotation="0 90 0" src="#my-image" ></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="9.5 1.5 -6.25"></a-box>

    <a-image position="9.44 1.5 -0.95" rotation="0 90 0" src="#my-image" ></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="9.5 1.5 -0.95"></a-box>

    <a-image position="-9.44 1.5 -6.25" rotation="0 90 0" src="#my-image" ></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="-9.5 1.5 -6.25"></a-box>

    <a-image position="-9.44 1.5 -0.95" rotation="0 90 0" src="#my-image" ></a-image>
    <a-box color="grey" depth="1" height="1" width=".1" position="-9.5 1.5 -0.95"></a-box>


  <a-sky src="#sky"></a-sky>
</a-scene>
