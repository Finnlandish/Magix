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
document.getElementById("containerSarters").append(node);

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




// let bulbasaur = document.createElement("div");
// document.getElementById("containerSarters").append(bulbasaur);
// bulbasaur.id = 'bulbasaur'
// let charmander = document.createElement("div");
// document.getElementById("containerSarters").append(charmander);
// charmander.id = 'charmander'

// var id = null;

// function move() {
//     var x1 = 1500;
//     var y1 = 500;
//     // var x1 = 750;
//     // var y1 = 500;
//     var x2 = 1650;
//     var y2 = 500;
//     var x3 = 1800;
//     var y3 = 500;

//     squirtle.style.top = y1 + 'px';
//     squirtle.style.left = x1 + 'px';
//     bulbasaur.style.top = y2 + 'px';
//     bulbasaur.style.left = x2 + 'px';
//     charmander.style.top = y3 + 'px';
//     charmander.style.left = x3 + 'px';
//     clearInterval(id);
//     id = setInterval(frame, 10);

//     function frame() {
//         x1--;
//         x2--;
//         x3--;
//         squirtle.style.left = x1 + 'px';
//         bulbasaur.style.left = x2 + 'px';
//         charmander.style.left = x3 + 'px';

//         if (x1 < 750) {
//             y1 += 0.2
//             x1 += 0.8
//             y2 += 0.2
//             x2 += 0.9
//             y3 += 0.2
//             x3 += 1
//             squirtle.style.top = y1 + 'px';
//             bulbasaur.style.top = y2 + 'px';
//             charmander.style.top = y3 + 'px';

//             if (y1 > 672) {
//                 y1 += 1
//                 y2 += 1
//                 y3 += 1
//                 squirtle.style.top = y1 + 'px';
//                 bulbasaur.style.top = y2 + 'px';
//                 charmander.style.top = y3 + 'px';

//                 if (y1 > 1072) {
//                     move()
//                 }
//             }
//         }
//     }
// }
// move()

$("#foo").mousemove(function(event) {
    $("#bee1").stop().animate({left: event.pageX, top: event.pageY}, 5000)
});
