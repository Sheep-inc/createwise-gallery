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
    <img id="my-image" src="https://picsum.photos/200/300">
  </a-assets>

  <a-entity id="cameraHolder" width="0" depth="0"   position="0 1.6 0">
    <!-- Camera Entity -->
    <a-entity id="camera" camera look-controls wasd-controls="acceleration: 100" kinematic-body></a-entity>
  </a-entity>

  <!--<a-box static-body position="-4.1 1.5 -2.5" color="#4CC3D9" width=".5" height="3" depth="8"></a-box>-->
  <!--<a-box static-body position="0 1.5 -6.5" color="#4CC3D9" width="8" height="3" depth="0.5"></a-box>-->
  <a-box static-body="" position="-4.1 1.5 -2.5" color="#4CC3D9" width=".5" height="3" depth="8" material="" geometry="" velocity=""></a-box>
  <a-box static-body="" position="0 1.5 -6.5" color="#4CC3D9" width="8" height="3" depth="0.5" material="" geometry="" velocity=""></a-box>

   <a-image position="0 1.5 -6.249" src="#my-image"></a-image>
  <a-box static-body position="3.75 1.5 -2.8" color="#4CC3D9" width=".5" height="3" depth="8"></a-box>
  <a-box static-body position="0 1.5 1.2" color="#4CC3D9" width="8" height="3" depth="0.5"></a-box>
  <!-- <a-box dynamic-body position="0 1 -2" color="#4CC3D9" width="1" height="1" depth="1"></a-box> -->

  <a-plane static-body rotation="-90 0 0" position="0 0 -4" width="20" height="10" color="#7BC8A4"></a-plane>
  <a-sky color="#ECECEC"></a-sky>
</a-scene>
