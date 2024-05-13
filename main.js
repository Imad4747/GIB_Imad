import * as THREE from 'three';
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';
const loader = new GLTFLoader();

// Create a scene
const scene = new THREE.Scene();

// Create a camera
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.z = 4;

// Create a renderer
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
renderer.setClearColor(0xffffff); // Set background color to black

// Append renderer's canvas to the specified div
const modelViewerDiv = document.getElementById('model-viewer');
modelViewerDiv.appendChild(renderer.domElement);

// Add orbit controls
const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true;

/// Array to store the names of the mesh parts you want to make red

// Load the glTF resource
// Load the glTF resource
loader.load(
    modelPath, // Use the dynamic model path
    function (gltf) {
        // Traverse through the loaded glTF map to find the mesh parts
        gltf.scene.traverse(child => {
            if (partsToMakeRed.includes(child.name)) {
                // Create a black material initially
                const material = new THREE.MeshStandardMaterial({
                    color: 0x000000, // Black color
                    roughness: 0.5, // Adjust roughness as needed
                    metalness: 0.5 // Adjust metalness as needed
                    // Additional properties can be adjusted here (e.g., emissive, map, roughnessMap, metalnessMap)
                });

                // Assign the black material to the mesh part
                child.material = material;

                // Enable shadows for the mesh part
                child.castShadow = true;
                child.receiveShadow = true;
            }
        });

        // Add the loaded glTF scene to the Three.js scene
        scene.add(gltf.scene);
    },
    // Called while loading is progressing
    function (xhr) {
        console.log((xhr.loaded / xhr.total * 100) + '% loaded');
    },
    // Called when loading has errors
    function (error) {
        console.error('An error happened', error);
    }
);

// Add lights

// Add a spotlight directly above the model
const spotLight = new THREE.SpotLight(0xffffff, 9000, 50, 0.22, 1);
spotLight.position.set(0, 25, 0);
spotLight.castShadow = true;
spotLight.shadow.bias = -0.0001;
scene.add(spotLight);

// Add animation loop
function animate() {
    requestAnimationFrame(animate);
    controls.update(); // Update controls
    renderer.render(scene, camera);
}
animate();

// JavaScript to handle click event and toggle selection
document.addEventListener('DOMContentLoaded', function () {
    var paintOptions = document.querySelectorAll('.paint-option');
    var paymentButton = document.getElementById('paymentButton');
    var paintPrice = 0;

    function calculateTotalPrice(productPrice) {
        return paintPrice + parseFloat(productPrice);
    }

    function changeModelColor(color) {
        // Replace this with your implementation to change the color of the model
        // Traverse through the loaded glTF map to find the mesh parts
        scene.traverse(child => {
            if (partsToMakeRed.includes(child.name)) {
                // Create a material with the specified color
                const material = new THREE.MeshStandardMaterial({
                    color: parseInt(color, 16), // Convert hex color to decimal
                    roughness: 0.5, // Adjust roughness as needed
                    metalness: 0.5 // Adjust metalness as needed
                    // Additional properties can be adjusted here (e.g., emissive, map, roughnessMap, metalnessMap)
                });

                // Assign the material to the mesh part
                child.material = material;
            }
        });
    }

    function handlePaintOptionClick(option) {
    paintOptions.forEach(function (opt) {
        opt.classList.remove('selected');
    });
    option.classList.add('selected');
    var color = option.getAttribute('data-color');
    changeModelColor(color);
    paintPrice = parseFloat(option.getAttribute('data-price'));
}


    paintOptions.forEach(function (option) {
        option.addEventListener('click', function () {
            handlePaintOptionClick(option);
        });
    });

    paymentButton.addEventListener('click', function () {
        var totalPrice = calculateTotalPrice(productPrice);
        console.log('Total Price: $' + totalPrice);
        console.log('P Price: $' + paintPrice);
    });

    var defaultColorOption = document.querySelector('.paint-option[data-color="000000"]');
    if (defaultColorOption) {
        handlePaintOptionClick(defaultColorOption);
    }
    
});
