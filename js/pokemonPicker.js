let squirtle = document.createElement("div");
document.getElementById("containerSarters").append(squirtle);
squirtle.id = 'squirtle'
let bulbasaur = document.createElement("div");
document.getElementById("containerSarters").append(bulbasaur);
bulbasaur.id = 'bulbasaur'
let charmander = document.createElement("div");
document.getElementById("containerSarters").append(charmander);
charmander.id = 'charmander'

var id = null;

function move() {
    var x1 = 1500;
    var y1 = 500;
    // var x1 = 750;
    // var y1 = 500;
    var x2 = 1650;
    var y2 = 500;
    var x3 = 1800;
    var y3 = 500;

    squirtle.style.top = y1 + 'px';
    squirtle.style.left = x1 + 'px';
    bulbasaur.style.top = y2 + 'px';
    bulbasaur.style.left = x2 + 'px';
    charmander.style.top = y3 + 'px';
    charmander.style.left = x3 + 'px';
    clearInterval(id);
    id = setInterval(frame, 10);

    function frame() {
        x1--;
        x2--;
        x3--;
        squirtle.style.left = x1 + 'px';
        bulbasaur.style.left = x2 + 'px';
        charmander.style.left = x3 + 'px';

        if (x1 < 750) {
            y1 += 0.2
            x1 += 0.8
            y2 += 0.2
            x2 += 0.9
            y3 += 0.2
            x3 += 1
            squirtle.style.top = y1 + 'px';
            bulbasaur.style.top = y2 + 'px';
            charmander.style.top = y3 + 'px';

            if (y1 > 672) {
                y1 += 1
                y2 += 1
                y3 += 1
                squirtle.style.top = y1 + 'px';
                bulbasaur.style.top = y2 + 'px';
                charmander.style.top = y3 + 'px';

                if (y1 > 1072) {
                    move()

                }
            }
        }


    }
}
move()


//audio
var squirtleAud = document.getElementById("squirtleAudio");
var bulbasaurAud = document.getElementById("bulbasaurAudio");
var charmanderAud = document.getElementById("charmanderAudio");


squirtle.onclick = () => {
    playsquirtle()
}
bulbasaur.onclick = () => {
    playbulbasaur()
}
charmander.onclick = () => {
    playcharmander()
}


function playsquirtle() {
    squirtleAud.play();
}

function playbulbasaur() {
    bulbasaurAud.play();
}

function playcharmander() {
    charmanderAud.play();
}