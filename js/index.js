import TiledImage from './TiledImage.js'
// =======================================================
// Animation in a canvas
// -------------------------------------------------------
let columnCount = 4;
let rowCount = 1;
let refreshDelay = 100; // msec
let loopColumns = true; // or by row?
let scale = 1.0;
// =======================================================
// Embed animation in a div
// Works the same way, with the same features as canvas, but embeds the sprite in a div instead of a canvas
// -------------------------------------------------------

let node = document.createElement("div");
document.getElementById("foo").append(node);

let tiledImageDOM = new TiledImage("img/pokeSprites/Wooper.png", 4, 1, 300, true, 1, node);

node.id = "wooperNode";
tiledImageDOM.changeRow(0);
let dim1 = 0
let dim2 = 50
let dim3 = 150
let dim4 = 150

tiledImageDOM.setMinMaxDimensions(dim1, dim2, dim3, dim4);

// Logic where the sprite changes row after animating through its columns
tiledImageDOM.changeMinMaxInterval(0, 4, () => {
    tiledImageDOM.changeRow(0);
    tiledImageDOM.changeMinMaxInterval(0, 4);
});

let x = 2000;
let y = 930;
let depx = -0.5;
let depy = 0.01;

const tickDOM = () => {

    x += depx
    y += depy
    if (x <= 1000) {
        depx = -0.8
        depy = 0.5
        tiledImageDOM.updateDimensions()

        if (y >= 1500) {
            x = 2000;
            y = 935;
            depx = -0.5;
            depy = 0.01;

        }


    }



    tiledImageDOM.tick(x, y);

    window.requestAnimationFrame(tickDOM);
}

tickDOM();

let doc = document.getElementById("welcomePlay");
var a = document.getElementById("welcomeAudio");

let wooper = document.getElementById("wooperNode");
var b = document.getElementById("wooperAudio");

doc.onclick = () => {
    playAudio()
}
wooper.onclick = () => {
    playWooper()
}


function playAudio() {
    a.play();
}

function playWooper() {
    b.play();
}

document.getElementById("connect").onclick= () => {
    setnom() 
}
function setnom() {
    var username = document.getElementById('username').value;
    window.localStorage.setItem("username",username);
}



