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
document.getElementById("container").append(node);

let tiledImageDOM = new TiledImage("img/pokemon/chansey.png", 4, 1, 300, true, 1, node);
node.id = "chansey";
tiledImageDOM.changeRow(0);
tiledImageDOM.setMinMaxDimensions(0, 50, 150, 150);

// Logic where the sprite changes row after animating through its columns
tiledImageDOM.changeMinMaxInterval(0, 4, () => {
    tiledImageDOM.changeRow(0);
    tiledImageDOM.changeMinMaxInterval(0, 4);
});

let x = 340;
let y = 250;
let depx = -0.5;
let depy = 0.4;
const tickDOM = () => {

    x += depx
    y += depy
    if (x <= 0) {


    }
    if (x <= -60) {
        // playChansey()

        x = 340;
        y = 250;
        x += depx
        y += depy
        // playChansey()

    }


    tiledImageDOM.tick(x, y);

    window.requestAnimationFrame(tickDOM);
}

tickDOM();


//audio
let chansey = document.getElementById("chansey");
var a = document.getElementById("chanseyAudio");


chansey.onclick = () => {
    playChansey()
}


function playChansey() {
    a.play();
}
