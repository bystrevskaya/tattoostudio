import * as THREE from 'three';
import { OrbitControls } from 'https://unpkg.com/three@0.141.0/examples/jsm/controls/OrbitControls.js';
import { OBJLoader } from 'https://unpkg.com/three@0.141.0/examples/jsm/loaders/OBJLoader.js';

const width = 650;
const height = 550;

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera( 75, width / height, 0.1, 1000 );

const renderer = new THREE.WebGLRenderer();
renderer.setSize( width, height );
document.querySelector('.model_fitting').appendChild( renderer.domElement );

camera.position.z = 5;

const controls = new OrbitControls(camera, renderer.domElement);

const spotLight = new THREE.SpotLight(0xffffff);
spotLight.position.set(200, 400, 300);
scene.add(spotLight);

const spotLight2 = new THREE.SpotLight(0xffffff);
spotLight2.position.set(200, 400, -300);
scene.add(spotLight2);

const manager = new THREE.LoadingManager();
new OBJLoader(manager).load("/obj/man.obj", man => {
    man.scale.set(0.4, 0.4, 0.4);
    man.position.y = -6;
    scene.add(man);
});

function animate() {
    requestAnimationFrame( animate );
    controls.update();
    renderer.render( scene, camera );
}
animate();