import TiledImage from "./TiledImage.js";
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
let doc = document.getElementById("container");

let tiledImageDOM = new TiledImage(
  "img/pokemon/chansey.png",
  4,
  1,
  300,
  true,
  1,
  node
);
node.id = "chansey";
tiledImageDOM.changeRow(0);
tiledImageDOM.setMinMaxDimensions(0, 50, 159, 159);

// Logic where the sprite changes row after animating through its columns
tiledImageDOM.changeMinMaxInterval(0, 4, () => {
  tiledImageDOM.changeRow(0);
  tiledImageDOM.changeMinMaxInterval(0, 4);
});

let x = 340;
let y = 280;
let depx = -0.5;
let depy = 0.4;
const tickDOM = () => {
  x += depx;
  y += depy;

  if (y >= 685) {
    doc.style.zIndex = "10";
    tiledImageDOM.setMinMaxDimensions(0, 50, 160, 160);

    depx = 0.5;
    depy = 0.08;
    if (x >= 340) {
      depx = 0;
      depy = 0;
    }
  }

  tiledImageDOM.tick(x, y);

  window.requestAnimationFrame(tickDOM);
};

tickDOM();

//audio
let chansey = document.getElementById("chansey");
var a = document.getElementById("chanseyAudio");

chansey.onclick = () => {
  playChansey();
};

function playChansey() {
  a.play();
}

document.onload = () => {
  getusername();
};

function getusername() {
  document.getElementById("name").innerHTML = JSON.stringify(
    window.localStorage.getItem("username")
  );
}

var stat = document.getElementById("statmp3");
var pvp = document.getElementById("pvpmp3");
var pve = document.getElementById("pvemp3");

let statb = document.getElementById("stats");
let pvpb = document.getElementById("jouer");
let pveb = document.getElementById("practice");

statb.onmouseenter = () => {
  stat.play();
};
statb.onmouseleave = () => {
  stat.pause();
};
pvpb.onmouseenter = () => {
  pvp.play();
};
pvpb.onmouseleave = () => {
  console.log("pvp");

  pvp.pause();
};

pveb.onmouseenter = () => {
  pve.play();
};
pveb.onmouseleave = () => {
  console.log("pve");
  pve.pause();
};
stat.volume = 0.05;
pvp.volume = 0.05;
pve.volume = 0.05;
